<?php
    session_start();

    if(isset($_SESSION['user_full'])) {
        $user = $_SESSION['user_full'];
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Add Happy Memories</title>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/add_mem.css">
    </head>
    <body>
        <div class="container">
            <div class="container-sup">
                <label>HappyDays App <a href="home.php"><i class="fas fa-sign-out-alt"></i></a></label>
                <hr>
                <p>What is your happy memory today?</p>
            </div>
            <form action="procs/proc_add_mem.php" method="post">
                <div class="input-group">
                    <label for="inp_user">Title</label>
                    <input type="text" id="inp_title" name="inp_title" onfocus="this.previousElementSibling.classList.add('label-animation');" onblur="if(this.value == ''){this.previousElementSibling.classList.remove('label-animation');}" required>
                </div>
                <div class="input-group">
                    <select onchange="verify_select(this.value)" name="sel_cat" id="sel_cat" required>
                        
                    </select>
                </div>
                <div class="input-group">
                    <textarea placeholder="Description" id="inp_desc" name="inp_desc" onfocus="this.previousElementSibling.classList.add('label-animation');" onblur="if(this.value == ''){this.previousElementSibling.classList.remove('label-animation');}"></textarea>
                </div>
                <div class="input-group">
                    <span>
                        <input type="radio" name="date" id="inp_date" value="1" checked>
                        <label for="inp_date">Today</label>
                    </span>
                    <span>
                        <input type="radio" name="date" id="inp_date">
                        <input type="date" value="2001-01-01" name="inp_date">
                    </span>
                </div>
                <button type="submit">Add Memory</button>
            </form>
            <div id="modal_cat" class="modal-cat">
                <div class="modal-content">
                    <label for="inp_cat">Insert a category name:</label>
                    <input type="text" name="inp_cat" id="inp_cat">
                    <button onclick="push_cat()" id="btn_add_cat">Add</button>
                </div>
            </div>
        </div>
    </body>
    <script>
        select = document.getElementById('sel_cat');

        add = document.getElementById('btn_add_cat');
        add.addEventListener('click', push_cat());

        function pull_select(select) {
            const conn = new XMLHttpRequest();
            conn.open('GET', 'procs/proc_get_cat.php');
            conn.send();
            conn.onload = () => {
                while(select.length != 0) {
                    select.removeChild(select.firstChild);
                }

                select.insertAdjacentHTML('beforeend','<option value="0" disabled selected>Category</option>');

                cat = JSON.parse(conn.responseText);
                if(cat != null) {
                    for(i = 0; i < cat['length']; i++) {
                        select.insertAdjacentHTML('beforeend', '<option value="' + cat[i].idcategories + '">'+ cat[i].ctgr_name +'</option>');
                    }
                }

                select.insertAdjacentHTML('beforeend','<option value="add"  >Add Category</option>');
            }
        }

        function verify_select(sel) {
            if(sel == "add") {
                document.all.modal_cat.style.display = "flex";
            }
        }

        function push_cat() {
            if(document.getElementById('inp_cat').value != '') {
                const conn = new XMLHttpRequest();
                conn.open('POST', 'procs/proc_add_cat.php');
                conn.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                conn.send('cat_name='+document.getElementById('inp_cat').value);
                conn.onload = () => {
                    pull_select(select);
                    document.all.modal_cat.style.display="none";
                    alert('Success Add! :D');
                }
            }
        }

        window.onclick = (event) => {
            if(event.target == document.all.modal_cat) {
                document.all.modal_cat.style.display = "none";
            }
        }

        select.addEventListener('load', pull_select(select));
        select.addEventListener('change', verify_select(select.value));
    </script>
</html>

<?php
    } else {
        header('Location: index.php');
    }
?>