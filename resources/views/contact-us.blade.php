<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="css/materialize.min.css" media="screen,projection" />
    <link type="text/css" rel="stylesheet" href="css/style.css" media="screen,projection" />
    <script src = "https://unpkg.com/axios/dist/axios.min.js" ></script >
    <script src="//cdnjs.cloudflare.com/ajax/libs/validate.js/0.12.0/validate.min.js"></script>

    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
</head>

<body>
<div class="form">
    <div class="container">
        <div class="row">
                <div class="row">
                    <div class="input-field col s6">
                        <input id="name" type="text" class="validate" placeholder="Name" required>
                        <label for="name">name</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="email" type="email" class="validate" placeholder="email" required>
                        <label for="email">email</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s6">
                        <input id="company" type="text" class="validate" placeholder="Company Name" required>
                        <label for="company">company</label>
                    </div>
                    <div class="input-field col s6">
                        <input id="phone-no" type="tel" class="validate" placeholder="12034567890" required>
                        <label for="phone-no">phone number</label>
                    </div>
                </div>
                <div class="row">
                    <div class="input-field col s12">
                        <select class="browser-default" id="subject">
                            <option value="" disabled selected>subject</option>
                            <option value="Just want to say Hi!">Just want o say Hi!</option>
                            <option value="Option 2">Option 2</option>
                            <option value="Option 3">Option 3</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <textarea id="message" rows="5" class="materialize-textarea" data-length="120" placeholder="Hi Guys!"></textarea>
                        <label for="message">message</label>
                    </div>
                </div>
                <button type="submit" class="waves-effect waves-light btn" onclick="submit()">Send</button>
                <div class="clearfix"></div>
        </div>
    </div>
</div>

<div class="thankyou">
    <div class="container">
        <div class="desc">
                <span>
                    <svg xmlns="http://www.w3.org/2000/svg" width="62" height="61" viewBox="0 0 62 61">
                        <g fill="none" stroke="#29AD29" stroke-linecap="round" stroke-linejoin="round" stroke-width="3" transform="translate(1 1)">
                            <polygon points=".81 26.087 58.475 1.188 33.39 58.187 23.701 35.681" />
                            <path d="M23.7285156 35.703125L58.7412109.936523438M13.2431641 37.7509766L10.4677734 40.3144531M19.5341797 39.7373047L5.44726562 53.484375M21.3876953 46.4824219L16.1074219 51.4980469" />
                        </g>
                    </svg>
                </span>
            <h2>
                Thank you for getting in touch!
            </h2>
            <p>we will get back to you soon!</p>
        </div>
    </div>
</div>
<!--JavaScript at end of body for optimized loading-->
<script type="text/javascript" src="js/materialize.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var elems = document.querySelectorAll('select');
        var instances = M.FormSelect.init(elems, options);
    });

    // Or with jQuery

    $(document).ready(function () {
        $('select').formSelect();
    });

    function submit () {
        let data = {
            name       : $('#name').val(),
            email      : $('#email').val(),
            company    : $('#company').val(),
            'phone-no' : $('#phone-no').val(),
            subject    : $('#subject').val(),
            message    : $('#message').val(),
        };
        axios.post('/contact-us', data)
             .then((res) => {
                 if(res.status === 200){
                     $('.thankyou').fadeIn('fast').delay(2500).fadeOut('fast');
                 }
             })
             .catch(function (error) {
                 if(error.response.status === 422){

                 }
                 console.log(error);
             });
    }

</script>
</body>

</html>
