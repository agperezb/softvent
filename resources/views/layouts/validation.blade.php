@if(!$errors->isEmpty())
    <script>
        message_toast('error', '{{ $errors->first() }}')
    </script>
@endif
@if(session('status'))
    <script>
        message_toast('success', '{{ session('status') }}')
    </script>
@endif
@if(session('error'))
    <script>
        message_toast('error', '{{ session('error') }}')
    </script>
@endif
@if(session('warning'))
    <script>
        message_toast('warning', '{{ session('warning') }}')
    </script>
@endif
