<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin dashboard</title>
    <link rel="stylesheet" href="./css/style.css">
   
</head>
<body>

   <!-- <div class="container">  -->

    <h1 class="admin">Admin dashboard</h1>

    <h2 class="create">Create news</h2>

    <h2>News</h2>

    <div class="container">     


        <form action="process.php" method="POST" class="create-post">
        
            <div class="input-field">
            
                <label for="title">Enter title</label>
                <input type="text" name="Article_title" id="title" autocomplete="off">

            </div>

            <div class="create-post-text">

                <textarea name="Article_content" id="Article_editor"></textarea>

                <label for="title1">Enter visible or not</label>
                <input type="number" name="Article_visible" id="title1" autocomplete="off">

                <label for="title2">Enter news type id</label>
                <input type="number" name="Article_news_type" id="title2" autocomplete="off">

                
                <input type="submit" class="publish-btn" name="submit_data" value="Create news post">
            </div>
        
        </form>

    
    </div>
        
        <h2>Change news type</h2>

        <form action="process.php" method="POST">


            <label for="title3">Enter news id</label>
            <input type="number" name="id_news" id="title3" autocomplete="off">

            <label for="title2">Enter new news type id</label>
            <input type="number" name="Article_news_type" id="title2" autocomplete="off">
            <input type="submit" class="publish-btn" name="submit_change_data_type" value="Change news type">

        </form>


        <h2>Show and hide posts (Show posts in time interval)</h2>


        <form method="POST" action="process.php">
            <label for="from_datetime">Enter date and time from</label>
            <input type="datetime-local" name="from_datetime" id="from_datetime">

            <label for="to_datetime">Enter date and time to</label>
            <input type="datetime-local" name="to_datetime" id="to_datetime">
            <input type="submit" class="publish-btn" name="submit_data_show" id="submit" value="Show news posts">
        </form>

        <h2>Update news</h2>

        <form action="process.php" method="post">

            <label for="date_and_time">Datetime picker (Enter date and time)</label>
            <input type="datetime-local" name="Article_datetime_picker" id="date_and_time" autocomplete="off">


            <div class="input-field">
            
                <label for="title">Update article title</label>
                <input type="text" name="Article_title" id="title" autocomplete="off">

            </div>

            <textarea name="Article_content" id="Article_editor"></textarea>
        

            <input type="submit" class="publish-btn" name="submit_data" value="Update post news">

        </form> 

        <h2>Show news by news ID</h2>


        <form method="POST" action="process.php">
            <label for="news-id">Enter news ID</label>
            <input type="number" name="news_by_ID" id="news-id">

            
            <input type="submit" class="publish-btn" name="submit_news_by_ID" id="submit" value="Show news by news ID">
        </form>



        <h2>Show limited amount of news posts</h2>

        <form method="POST" action="process.php">
            <label for="news-type">Enter news type</label>
            <input type="number" name="news_type" id="news-type">

            <label for="news-limit">Enter the limit of posts</label>
            <input type="number" name="limit_of_posts" id="news-limit">
            <input type="submit" class="publish-btn" name="submit_data_show_type_limited" id="submit" value="Show limited posts">
        </form>

</div>

    <script src="ckeditor/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('Article_editor');

    </script>

</body>
</html>