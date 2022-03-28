(function (document) {

  function htmlToElement(html) {
    const template = document.createElement('template');
    html = html.trim();
    template.innerHTML = html;
    return template.content.firstChild;
  }

  function generateWistiaVideoPlayer (id) {
    const embedMedias = document.createElement('script');
    embedMedias.src = `https://fast.wistia.com/embed/medias/${id}.jsonp`
    embedMedias.async = true;

    const assetsExternal = document.createElement('script');
    assetsExternal.src = `https://fast.wistia.com/assets/external/E-v1.js`
    assetsExternal.async = true;


    const generateVideoBlock = htmlToElement(`
    <div class="embed-responsive embed-responsive-16by9">
      <div class="embed-responsive-item">
        <div class="wistia_responsive_padding" style="position:relative;">
          <div class="wistia_responsive_wrapper" style="height:100%;left:0;top:0;width:100%;">
            <div class="wistia_embed wistia_async_${id} seo=false videoFoam=true autoPlay=true" style="height:100%;position:relative;width:100%">
              <div class="wistia_swatch" style="height:100%;left:0;opacity:0;overflow:hidden;position:absolute;top:0;transition:opacity 200ms;width:100%;">
                <img src="https://fast.wistia.com/embed/medias/${id}/swatch" style="filter:blur(5px);height:100%;object-fit:contain;width:100%;" alt="" onload="this.parentNode.style.opacity=1;" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>`)

    const container = document.createElement('div')

    container.classList.add('wistia-featured-video')
    container.appendChild(embedMedias)
    container.appendChild(assetsExternal)
    container.appendChild(generateVideoBlock)

    return container
  }

  const wistiaFeaturedContainer = document.querySelector(".video-featured-container")

  wistiaFeaturedContainer.addEventListener('click', e => {
    e.preventDefault();

    const container = e.path[1].nodeName === 'A' ? e.path[1] : e.path[2]

    const { wistia } = container.dataset

    const videoPlayer = generateWistiaVideoPlayer(wistia)

    container.replaceWith(videoPlayer)
  })
})(document);
