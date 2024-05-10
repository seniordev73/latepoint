/**
 * Form Editors
 */

'use strict';

(function () {
  // Snow Theme
  // --------------------------------------------------------------------
  const snowEditor = new Quill('#snow-editor', {
    bounds: '#snow-editor',
    modules: {
      formula: true,
      toolbar: '#snow-toolbar'
    },
    theme: 'snow'
  });

  // Bubble Theme
  // --------------------------------------------------------------------
  const bubbleEditor = new Quill('#bubble-editor', {
    modules: {
      toolbar: '#bubble-toolbar'
    },
    theme: 'bubble'
  });

  // Full Toolbar
  // --------------------------------------------------------------------
  const fullToolbar = [
    [
      {
        font: []
      },
      {
        size: []
      }
    ],
    ['bold', 'italic', 'underline', 'strike'],
    [
      {
        color: []
      },
      {
        background: []
      }
    ],
    [
      {
        script: 'super'
      },
      {
        script: 'sub'
      }
    ],
    [
      {
        header: '1'
      },
      {
        header: '2'
      },
      'blockquote',
      'code-block'
    ],
    [
      {
        list: 'ordered'
      },
      {
        list: 'bullet'
      },
      {
        indent: '-1'
      },
      {
        indent: '+1'
      }
    ],
    [{ direction: 'rtl' }],
    ['link', 'image', 'video', 'formula'],
    ['clean']
  ];
  const fullEditor1 = new Quill('#full-editor1', {
    bounds: '#full-editor1',
    placeholder: 'Type Something...',
    modules: {
      formula: true,
      toolbar: fullToolbar
    },
    theme: 'snow'
  });

  const fullEditor2 = new Quill('#full-editor2', {
    bounds: '#full-editor2',
    placeholder: 'Type Something...',
    modules: {
      formula: true,
      toolbar: fullToolbar
    },
    theme: 'snow'
  });

  const fullEditor3 = new Quill('#full-editor3', {
    bounds: '#full-editor3',
    placeholder: 'Type Something...',
    modules: {
      formula: true,
      toolbar: fullToolbar
    },
    theme: 'snow'
  });

  const fullEditor4 = new Quill('#full-editor4', {
    bounds: '#full-editor4',
    placeholder: 'Type Something...',
    modules: {
      formula: true,
      toolbar: fullToolbar
    },
    theme: 'snow'
  });
})();
