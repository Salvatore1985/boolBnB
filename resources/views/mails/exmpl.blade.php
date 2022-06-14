<form action="{{ route('guest.send') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" name="name" id="name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" name="email" id="email">
    </div>
    <div class="form-floating mb-3">
        <textarea class="form-control" placeholder="Leave a comment here" id="messege" style="height: 100px" name="message"></textarea>
        <label for="messege">Messege</label>
    </div>


    <button type="submit" class="btn btn-primary">Send Messege</button>
</form>