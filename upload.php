#!/usr/bin/php
<?php
   include('header.php');
   include('header-mvspt.php');
?>
            <section id="content" class="body largeprint">
            <!-- Section: Upload -->
               <h3>Strategy Upload Status</h3>
               <p>
               <?php
                  if ((($_FILES["file"]["type"] == "text/plain")
                  || ($_FILES["file"]["type"] == "text/x-c")
                  || ($_FILES["file"]["type"] == "text/x-java-source")
                  || ($_FILES["file"]["type"] == "text/x-python")
                  || ($_FILES["file"]["type"] == "application/pdf"))
                  && ($_FILES["file"]["size"] < 2097152))
                    {
                    if ($_FILES["file"]["error"] > 0)
                      {
                      echo "Return code: " . $_FILES["file"]["error"] . "<br />";
                      }
                    else
                      {
                      //echo "Upload: " . $_FILES["file"]["name"] . "<br />";
                      echo "Type: " . $_FILES["file"]["type"] . "<br />";
                      echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
                      //echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

                      if (file_exists("uploads/" . $_FILES["file"]["name"]))
                        {
                        echo $_FILES["file"]["name"] . " already exists. ";
                        }
                      else
                        {
                        move_uploaded_file($_FILES["file"]["tmp_name"],
                        "uploads/" . $_FILES["file"]["name"]);
                        echo "Uploaded as: " . $_FILES["file"]["name"];
                        }
                      }
                    }
                  else
                    {
                    echo "Invalid filetype or size.<br />Please upload a plain text file, Java/C/C++/Python source file or a PDF that is less than 2MB in size.";
                    }
               ?>
               <p><a class="link" href="mvspt.php">Back</a> to MVSPT site</p>
               <p><a class="link" href="index.php">Return</a> to the main site</p>
            </section>
<?php
   include('footer-preblank.php');
   include('footer.php');
?>
