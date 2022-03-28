<?php
wp_enqueue_style("social-share", get_stylesheet_directory_uri() . "/dist/styles/social-share.css", array(), filemtime(get_stylesheet_directory() . "/dist/styles/social-share.css"), false);
wp_enqueue_script("social-share", get_stylesheet_directory_uri() . "/dist/scripts/social-share.min.js#asyncload", [], true);
?>
<div class="social-share">
  <ul>
    <li>
      <!-- Facebook -->
      <a href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" class="social-share__btn social-share__btn--facebook" data-action="facebook">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <defs />
          <path fill="currentColor" d="M16.536 14.712h3.111l.465-3.61h-3.576V8.798c0-1.046.291-1.76 1.79-1.76h1.911V3.81a25.188 25.188 0 00-2.786-.143c-2.757 0-4.643 1.682-4.643 4.773v2.662H9.691v3.61h3.117V24h3.728v-9.288z" />
        </svg>
      </a>
    </li>
    <li>
      <!-- Twitter -->
      <a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target="_blank" class="social-share__btn social-share__btn--twitter" data-action="twitter">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <defs />
          <path fill="currentColor" d="M21.222 6.282a7.557 7.557 0 01-2.173.595 3.798 3.798 0 001.665-2.094 7.545 7.545 0 01-2.404.918c-1.989-2.127-5.537-1.304-6.385 1.482a3.785 3.785 0 00-.063 1.97 10.748 10.748 0 01-7.801-3.954 3.785 3.785 0 001.171 5.053 3.772 3.772 0 01-1.714-.473v.046a3.788 3.788 0 003.036 3.711 3.8 3.8 0 01-1.71.066 3.787 3.787 0 003.536 2.629 7.598 7.598 0 01-5.603 1.567A10.711 10.711 0 008.578 19.5c6.961 0 10.768-5.768 10.768-10.77 0-.162-.004-.327-.011-.488a7.695 7.695 0 001.888-1.959z" />
        </svg>
      </a>
    </li>
    <li>
      <!-- Reddit (url, title) -->
      <a href="http://reddit.com/submit?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" class="social-share__btn social-share__btn--reddit" data-action="reddit">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <defs />
          <path fill="currentColor" d="M20.44 12.112c-.052-1.423-1.626-2.257-2.832-1.5a1.855 1.855 0 00-.298.233 9.02 9.02 0 00-4.878-1.559l.823-3.953 2.712.57a1.267 1.267 0 10.165-.773l-3.105-.621a.393.393 0 00-.469.304l-.937 4.397a9.05 9.05 0 00-4.942 1.559c-1.038-.976-2.743-.463-3.07.924a1.851 1.851 0 001.029 2.104 3.712 3.712 0 000 .558c0 2.838 3.308 5.145 7.388 5.145s7.388-2.307 7.388-5.145a3.712 3.712 0 000-.558 1.847 1.847 0 001.026-1.685zM7.768 13.379a1.267 1.267 0 112.534 0 1.267 1.267 0 01-2.534 0zm7.363 3.485a4.86 4.86 0 01-3.13.976 4.857 4.857 0 01-3.13-.976.342.342 0 01.481-.482 4.145 4.145 0 002.636.799 4.156 4.156 0 002.648-.773.355.355 0 11.495.507v-.051zm-.228-2.167a1.267 1.267 0 111.267-1.267 1.268 1.268 0 01-1.28 1.318l.013-.051z" />
        </svg>
      </a>
    </li>
    <li>
      <!-- LinkedIn -->
      <a href="http://www.linkedin.com/shareArticle?url=<?php the_permalink(); ?>&title=<?php the_title(); ?>" target="_blank" class="social-share__btn social-share__btn--linkedin" data-action="linkedin">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <defs />
          <path fill="currentColor" d="M19.509 19.5h-3.107v-4.872c0-1.161-.024-2.656-1.621-2.656-1.62 0-1.867 1.264-1.867 2.571V19.5h-3.11V9.483h2.986v1.365h.041c.417-.786 1.432-1.618 2.948-1.618 3.149 0 3.732 2.074 3.732 4.771V19.5h-.002zM6.294 8.113a1.803 1.803 0 01-1.805-1.807c.001-1.39 1.506-2.257 2.709-1.561C8.4 5.44 8.4 7.178 7.196 7.872a1.809 1.809 0 01-.903.241h.001zM7.852 19.5H4.735V9.483h3.118V19.5h-.001z" />
        </svg>
      </a>
    </li>
    <li>
      <!-- Email -->
      <a href="mailto:?subject=<?php the_title(); ?>&body=<?php the_permalink(); ?>" target="_blank" class="social-share__btn social-share__btn--email" data-action="email">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24">
          <path d="M3 3h18a1 1 0 0 1 1 1v16a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V4a1 1 0 0 1 1-1zm17 4.238l-7.928 7.1L4 7.216V19h16V7.238zM4.511 5l7.55 6.662L19.502 5H4.511z" fill="currentColor" />
        </svg>
      </a>
    </li>
  </ul>
</div>
