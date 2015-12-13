<div id="formContainer">
    <div id="form">
        <form action="index.php?action=add" method="post">
            <fieldset class="form-group">
                <label for="subject">Subject</label>
                <input name="subject" type="text" class="form-control" id="subject" maxlength="30" placeholder="Post subject">
            </fieldset>

            <fieldset class="form-group">
                <label for="text">Text</label>
                <textarea name="text" class="form-control" id="text" rows="5" placeholder="Your post goes here"></textarea>
            </fieldset>

            <fieldset class="form-group">
                <label for="author">Author</label>
                <input name="author" type="text" class="form-control" id="author" maxlength="40" placeholder="Enter your name">
            </fieldset>

            <button type="submit" id="submit_btn" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
