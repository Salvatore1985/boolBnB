<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('guest.send') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="apartment_id" class="form-label">apartment_id</label>
                        <input type="text" class="form-control" name="apartment_id" id="apartment_id">
                    </div>

                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" name="email" id="email">
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Leave a comment here" id="email_content" style="height: 100px" name="email_content"></textarea>
                        <label for="email_content"ege>Messege</label>
                    </div>


                    <button type="submit" class="btn btn-primary">Send Messege</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>