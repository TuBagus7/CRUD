<?php
include_once("config.php");
$result = mysqli_query($mysqli, "SELECT * FROM crud ORDER BY id DESC");
?>
 
<html>
<head>    
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
 
<body>
<a href="add.php">Add New User</a><br/><br/>
 
    <table width='80%' class="border-separate">
 
    <tr>
        <th class = "border border-2 border-pink-900">Name</th> 
        <th class = "border border-2 border-pink-900">Mobile</th> 
        <th class = "border border-2 border-pink-900">Email</th> 
        <th class = "border border-2 border-pink-900">Action</th>
    </tr>
    <?php  
    while($user_data = mysqli_fetch_array($result)) {         
        echo "<tr>";
        echo "<td class = 'border border-2 border-pink-900 text-center'>".$user_data['name']."</td>";
        echo "<td class = 'border border-2 border-pink-900 text-center'>".$user_data['mobile']."</td>";
        echo "<td class = 'border border-2 border-pink-900 text-center'>".$user_data['email']."</td>";    
        echo "<td class = 'border border-2 border-pink-900 text-center'><a href='edit.php?id=$user_data[id]'>Edit</a> | <button class ='bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded' onclick='pus($user_data[id])'>Delete</button></td></tr>";        

    }
    ?>
    </table>
    <script>
        function pus (id){
            const text = "Are your sure";
            if(confirm(text)==true){
                location.href = `delete.php?id=${id}`;
            }else{
                location.href = '#';
            }
        }
    </script>
</body>
</html>