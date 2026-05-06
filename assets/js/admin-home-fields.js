(function ($) {
  function openMediaFrame(targetId) {
    const target = document.getElementById(targetId);
    if (!target) {
      return;
    }

    const frame = wp.media({
      title: 'Pilih gambar',
      button: {
        text: 'Gunakan gambar ini',
      },
      multiple: false,
      library: {
        type: 'image',
      },
    });

    frame.on('select', function () {
      const attachment = frame.state().get('selection').first().toJSON();
      target.value = attachment.url || '';
      target.dispatchEvent(new Event('change', { bubbles: true }));
      updatePreview(targetId, attachment.url || '');
    });

    frame.open();
  }

  function updatePreview(targetId, url) {
    const preview = document.querySelector('[data-preview-for="' + targetId + '"]');
    if (!preview) {
      return;
    }

    if (url) {
      preview.src = url;
      preview.style.display = 'block';
    } else {
      preview.src = '';
      preview.style.display = 'none';
    }
  }

  $(document).on('click', '.semut-upload-image', function (event) {
    event.preventDefault();
    openMediaFrame($(this).data('target'));
  });

  $(document).on('click', '.semut-clear-image', function (event) {
    event.preventDefault();
    const target = document.getElementById($(this).data('target'));
    if (target) {
      target.value = '';
      target.dispatchEvent(new Event('change', { bubbles: true }));
      updatePreview(target.id, '');
    }
  });

  $(document).on('input change', 'input[type="url"]', function () {
    if (this.id && this.id.indexOf('image') !== -1) {
      updatePreview(this.id, this.value);
    }
  });
})(jQuery);
