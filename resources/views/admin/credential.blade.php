<html>
    <head>
        <title>Credentials</title>
        <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    </head>
    <body>
        @if(session('credentials'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
{{ session('credentials') }}



                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              @endif
              <div class="alert alert-success alert-dismissible fade show" role="alert">

            <strong>New Username: </strong><p id="n-name">
             
            {{$username}}
        </p> <button id="nameCopy" style="border:none;border-radius:5px;">Copy</button>


<br>
<strong>New password: </strong><p id="n-password">    
            {{$password}}
        </p>     <button id="passwordCopy" style="border:none;border-radius:5px;">Copy</button>

<br>
<strong>Note: </strong><p>Copy the username and password. Paste them in database table name 'user' manually. </p>

<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div> 
              <a href="{{ url()->previous() }}" class="btn btn-primary">Back</a>

    </body>
    <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script>
        // JavaScript to handle copying the text to the clipboard
        document.getElementById("nameCopy").addEventListener("click", function() {
            var textToCopy = document.getElementById("n-name").innerText;
            var tempInput = document.createElement("input");
            document.body.appendChild(tempInput);
            tempInput.value = textToCopy;
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            alert("Text copied to clipboard: " + textToCopy);
        });
    </script>
    <script>
        // JavaScript to handle copying the text to the clipboard
        document.getElementById("passwordCopy").addEventListener("click", function() {
            var textToCopy = document.getElementById("n-password").innerText;
            var tempInput = document.createElement("input");
            document.body.appendChild(tempInput);
            tempInput.value = textToCopy;
            tempInput.select();
            document.execCommand("copy");
            document.body.removeChild(tempInput);
            alert("Text copied to clipboard: " + textToCopy);
        });
    </script>
</html>