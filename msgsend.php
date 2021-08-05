<?php include 'template/auth.php';?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <link rel="stylesheet" href="css/bootstrap.min.css">
    </head>
    <body>
        <?php include 'template/header.php';?>
        <div class="container">
            <div class="col-sm-7">
                <form action="msghandler.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="msg">Send message to user:</label>
                        <textarea class="form-control" name="message" id="msg" rows="1"></textarea>
                    </div>
                    <p style="color: green"><?php if(isset($_GET['status']) && $_GET['status'] == "success") echo "Sent!";?></p>
                    <p style="color: red"><?php if(isset($_GET['status']) && $_GET['status'] == "fail") echo "There's an error while sending!";?></p>
                    <button type="submit" name="send" class="btn btn-success btn-lg">Send</button>
                </form>
            </div>
        </div>
    </body>
    <script>
        const tx = document.getElementsByTagName("textarea");
        for (let i = 0; i < tx.length; i++) {
          tx[i].setAttribute("style", "height:" + (tx[i].scrollHeight) + "px;overflow-y:hidden;");
          tx[i].addEventListener("input", OnInput, false);
        }
        function OnInput() {
          this.style.height = "auto";
          this.style.height = (this.scrollHeight) + "px";
        }
    </script>
</html>