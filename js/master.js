var ypos,image;
		function parallex()
    {
			ypos = window.pageYOffset;
			image = document.getElementById('head');
			image.style.top = ypos * .8 + 'px';

    }
  window.addEventListener('scroll',parallex);
