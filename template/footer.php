<!-- Add property form -->
<a onclick="toggleForm('form')" class="button add-form-btn">+</a>
<div class="form-box" id="form">
    <div class="form">
        <a class="close-form" onclick="toggleForm('form')">x</a>
        <h2>Add property</h2>
        <form action="../add.php" method="post" enctype="multipart/form-data">
            <input type="text" name="title" placeholder="Property title..." Required>
            <textarea name="description" rows="5" placeholder="Property description"></textarea>
            <label for="image" style="cursor:pointer;">Upload image</label>
            <input style="margin-bottom: .5rem;" type="file" name="image" id="image">
            <input type="number" name="price" placeholder="Property price..." Required>
            <input type="text" name="location" placeholder="Property location..." Required>
            <input type="number" name="bedroom" placeholder="How many bedroom...">
            <input type="number" name="bathroom" placeholder="How many bathroom...">
            <input type="number" name="square" placeholder="Property square ft.." Required>
            <input type="number" name="garage" placeholder="How many garage...">
            <button type="submit" class="button">Add property</button>
        </form>
    </div>

</div>
<script>
    function toggleForm(id) {
        let form = document.getElementById(id);
        // let btn = document.getElementById(id);
        if (form.classList.contains('open')) {
            form.classList.remove('open');
        } else {
            form.classList.add('open');
        }
    }
</script>
</body>

</html>