<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Base64 Decoder</title>
    
  </head>
  <body>
    Base64 Decoder
    <form name="decode" action="" method="post" enctype="multipart/form-data">
        <textarea id="decode_field" name="decode_field" rows="15" cols="50" autofocus><?
            // TODO // -- User will submit csv file with encoded base64 data in the second column of each row. Software will display decoded data to user.
            // 1. Software will grab the value in col 2 of each row and create a new file from that data.
            // 2. Software will decode the data and display that data to the user.
            
            // If 'Get Encoded Data' btn is pressed
            if (isset($_POST['decode_btn'])) {
              $data = array();

              $csv_file = $_FILES['file']['name'];

              move_uploaded_file($_FILES["file"]["tmp_name"],
              "/home1/sendytoo/public_html/decode/uploads/".$_FILES["file"]["name"]);

              // Cut base64 data from csv file. Selected data is in col 2 of each row. -- $encoded_data
              //exec("cut -d, -f2 test.csv", $data);
              exec("cut -d, -f2 uploads/".$csv_file, $data);

              // Decode data
              foreach($data as $line) {
                echo base64_decode($line)."\n";
              }
            }

        ?></textarea>
        <br/>
        <input type="file" name="file" style="width:140px;" value="" />
        <br/>
        <!-- PHP: Get correct data from submitted file and create a new file out of it -->
        <input type="submit" name="decode_btn" value="Decode" />
    </form>

    <script src="base64.js"></script>        
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <script type="text/javascript">
      // $(document).ready(function(){
      //     $("button").click(function(){
      //         var getText = document.getElementById('decode_field').value;
      //         $('#decode_field').empty().append(Base64.decode(getText));
      //     });
      // });
    </script>
    
  </body>
</html>
