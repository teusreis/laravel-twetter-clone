<div class="border border-primary-light p-3 rounded">
    <form action="/tweets" method="POST">
        @csrf

        <textarea
            class="form-control"
            name="body"
            id=""
            cols="15"
            rows="5"
            placeholder="What's up doc?"
        ></textarea>
        <hr>
        @error('body')
            <p class="text-danger">
                {{ $message }}
            </p>
        @enderror

        <footer class="d-flex justify-content-between">
            <img class="img-fluid rounded-circle mr-2" src="{{ auth()->user()->avatar }}" width="40" alt="">
            <button type="submit" class="btn btn-primary">Submit tweet</button>
        </footer>
    </form>
</div>

