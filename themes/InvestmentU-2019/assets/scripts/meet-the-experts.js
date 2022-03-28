(function (document) {
  // adding smoothscroll polyfill for Safari
  const smoothscroll = require('smoothscroll-polyfill')
  // kick off the polyfill!
  smoothscroll.polyfill();

  const carousel = document.querySelector('#expertCarousel') // find carousel by id
  const controls = carousel.querySelectorAll('.carousel-controls') // get the controls inside the founded carousel
  const inner = carousel.querySelector('.carousel-inner') // get the inner div inside the founded carousel
  // get the slides inside the founded carousel
  // we need to destructur them bc querySelectiorAll returns a NodeList and it didn't have some Arrays prototypes
  const slides = [...carousel.querySelectorAll('.carousel-item')]

  // when runned, it returns the currently actived slide through carousel-item-actived class
  const activeSlideIndex = () => {
    const findIndex = slides.findIndex(el => el.classList.contains('carousel-item-actived'))

    // when the actived slide was not founded, findIndex function will return -1
    if (findIndex < 0) {
      return 0
    }

    // so we must set the first slide to actived
    return findIndex
  }

  // creates interval var
  let interval

  function breakpoints () {
    // the made it works for all screenbreak points we need to get which breakpoint is actived
    // Bootstrap makes all breakpoints and each breakable width availabe through a css variable like '--breakpoint-sm: 576px'
    const bkps = ['sm', 'md', 'lg', 'xl'] // here we map all bootstrap breakpoints, maybe we could use regex instead hardcod them
    const sizes = bkps.map(bp => getComputedStyle(document.documentElement).getPropertyValue(`--breakpoint-${bp}`))
    /*
    so, it has to return an object like this with the breakpoints' name as key and each respective breakable width as value
      {
        xs: "0",
        sm: "576px",
        md: "768px",
        lg: "992px",
        xl: "1200px"
      }
    */
    return bkps.reduce((obj, key, index) => ({ ...obj, [key]: sizes[index] }), {})
  }

  // it recieves an slide id to set it as actived
  function moveCarouselTo (id = 0) {
    let el = slides[id]

    if (!el) {
      // if no slide is founded, just do nothing
      return
    }

    // find the current slided actived
    const currentSlide = slides[activeSlideIndex()]

    // remove the "actived" markers from current slide
    currentSlide.classList.remove('carousel-item-actived')
    currentSlide.setAttribute('aria-selected', 'false') // accessibility stuff

    // add the "actived" markers to slide to be actived
    el.classList.add('carousel-item-actived')
    el.setAttribute('aria-selected', 'true') // accessibility stuff

    // move .carousel-inner's scroll to match the new actived slide
    inner.scrollTo({
      top: 0,
      left: currentSlide.offsetWidth * id,
      behavior: 'smooth'
    });
  }

  // it recieves which side of the carousel must be moved and do it
  function move (side) {
    // only accepts next and prev
    if (!['prev', 'next'].includes(side)) {
      return
    }

    // get the current slided index
    const currentIndex = activeSlideIndex()

    // trhough this function
    const thresold = () => {
      const thresolds = {
        'md': 2,
        'lg': 3,
        'xl': 4,
      }


      const [ firstMatch ] = Object.entries(breakpoints()).map(breakpoint => {
        // convert all the breakpoints to an array like ["sm", "576px"]
        // and check which breakpoint is matched
        const { matches } = window.matchMedia(`(min-width: ${breakpoint[1]} )`)
        // and return its name if matched
        if (matches) {
          return breakpoint[0]
        }
      })
        .filter(el => !!el) // keep only matched breakpoints in the array
        .reverse() // revert the matches bc of bootstrap uses min-width
      // return how many slides it should move (by default, move one slide)
      return thresolds[firstMatch] || 1
    }

    const prevIndex = () => {
      // figure out how many slides it should move
      const prev = currentIndex - thresold()

      if (currentIndex && prev === -1) {
        // prev will be -1 only when thresold() was 3 or 1
        // but when current slide is 0, just move on
        return 0
      }

      if (prev < 0) {
        // when prev is below 0, move to the last slide
        return slides.length - 1
      }

      // else move to the prev slide
      return prev
    }
    const nextIndex = () => {
      // figure out how many slides it should move
      const next = currentIndex + thresold()

      if (next >= slides.length) {
        // when it tries to move besides last slide
        // move to frist slide
        return 0
      }

      // else move to the next slide
      return next
    }
    // move to selected slide
    moveCarouselTo(side === 'prev' ? prevIndex() : nextIndex())
  }

  controls.forEach(el => {
    // add the click event lister in all founded controls
    el.addEventListener('click', () => {
      // get clicked direction
      const { direction = 'next' } = el.dataset
      // before move the slider, clear the auto movement interval
      clearInterval(interval)
      // move the slider by direction seted in "data-direction" attr or next as default
      move(direction)
      window.dataLayer = window.dataLayer || [];
      // trigger gtm just when clicked
      if (dataLayer && typeof dataLayer.push === 'function') {
        dataLayer.push({
          'event':'event_triggered',
          'event_category':'Editor Carousel',
          'event_action':'Prev Next Click'
        });

        dataLayer.push({
          'event':'event_triggered',
          'event_category':'Editor Carousel',
          'event_action':`${direction.charAt(0).toUpperCase() + direction.slice(1)} Click`
        });
      }
      // reset the interval after moving slide
      interval = setInterval(() => move('next'), 7000);
    })
  })

  window.addEventListener('resize', () => {
    // if user resizes the browser,
    // it should keep the activated slide visible
    moveCarouselTo(activeSlideIndex())
  }, true)

  //set interval after all
  interval = setInterval(() => move('next'), 7000);


})(document);
