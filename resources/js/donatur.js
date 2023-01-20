(function() {
  /**
   * VARIABLES
   */
  const imgInput = document.getElementById('profile-pic-form');
  const imgProfile = document.getElementById('profile-pic');

  /**
   * EVENT LISTENERS
   */
  imgInput.addEventListener('change', (e) => {
    if (e.target.files && e.target.files[0]) {
      const reader = new FileReader();

      reader.onload = (readerEvent) => {
        imgProfile.setAttribute('src', readerEvent.target.result);
      };

      reader.readAsDataURL(e.target.files[0]);
    }
  });
})();
