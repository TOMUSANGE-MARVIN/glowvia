@pushOnce('header')
<link href="{{ asset('vendor/codemirror/lib/codemirror.css') }}" rel="stylesheet"/>
<script type="text/javascript" src="{{ asset('vendor/codemirror/lib/codemirror.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/codemirror/addon/edit/matchbrackets.js') }}"></script>
<link href="{{ asset('vendor/codemirror/theme/monokai.css') }}" rel="stylesheet"/>

<link href="{{ asset('vendor/codemirror/addon/fold/foldgutter.css') }}" rel="stylesheet"/>
<script src="{{ asset('vendor/codemirror/addon/fold/foldcode.js') }}"></script>
<script src="{{ asset('vendor/codemirror/addon/fold/foldgutter.js') }}"></script>
<script src="{{ asset('vendor/codemirror/addon/fold/brace-fold.js') }}"></script>
<script src="{{ asset('vendor/codemirror/addon/fold/xml-fold.js') }}"></script>
<script src="{{ asset('vendor/codemirror/addon/fold/indent-fold.js') }}"></script>
<script src="{{ asset('vendor/codemirror/addon/fold/markdown-fold.js') }}"></script>
<script src="{{ asset('vendor/codemirror/addon/fold/comment-fold.js') }}"></script>
<script src="{{ asset('vendor/codemirror/addon/comment/comment.js') }}"></script>

<script type="text/javascript" src="{{ asset('vendor/codemirror/mode/htmlmixed/htmlmixed.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/codemirror/mode/xml/xml.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/codemirror/mode/javascript/javascript.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/codemirror/mode/css/css.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/codemirror/mode/clike/clike.js') }}"></script>
<script type="text/javascript" src="{{ asset('vendor/codemirror/mode/php/php.js') }}"></script>
@endPushOnce

<div class="code-editor" name="code-editor">
  <textarea name="{{ $name }}">{{ $value }}</textarea>
</div>

@pushOnce('footer')
<script>
document.querySelectorAll('.code-editor').forEach(function (editor) {
  var codemirror = CodeMirror.fromTextArea(editor.querySelector('textarea'), {
    lineNumbers: true,
    matchBrackets: true,
    mode: "text/x-php",
    // indentUnit: 4,
    indentWithTabs: true,
    theme: 'monokai',
    foldGutter: true, // Enable code folding
    gutters: ["CodeMirror-linenumbers", "CodeMirror-foldgutter"], // Set position of fold gutter icons
    extraKeys: {
      "Ctrl-/": "toggleComment",
      "Cmd-/": "toggleComment",
      "Ctrl-Space": "autocomplete"
    }
  });

  // codemirror.setValue("");
  codemirror.setSize('100%', '500px');

  // If inside a hidden tab, refresh the editor when the tab is shown to ensure correct rendering
  $('.code-tabs .nav-item').on('click', function () {
    codemirror.refresh();
  });
});

</script>

<style></style>
@endPushOnce