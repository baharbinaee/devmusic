
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
<meta charset="UTF-8">
<title>Add to playlist</title>
<style>
body { font-family: Tahoma, sans-serif; background: #f7f7f7; display:flex; justify-content:center; align-items:center; min-height:100vh; margin:0; }
.card { background:#fff; padding:20px 25px; border-radius:10px; box-shadow:0 4px 15px rgba(0,0,0,0.1); width:100%; max-width:400px; }
h2 { text-align:center; color:#333; margin-top:0; }
label { display:block; margin-bottom:6px; color:#333; font-size:14px; }
input[type="text"], input[type="file"], textarea { width:100%; padding:10px; margin-bottom:15px; border-radius:6px; border:1px solid #ccc; box-sizing:border-box; font-size:14px; }
textarea { resize:vertical; min-height:100px; }
button { width:100%; padding:12px; background:#2b6cb0; color:#fff; font-size:16px; border:none; border-radius:6px; cursor:pointer; transition:0.3s; }
button:hover { background:#1f4f82; }
</style>
</head>
<body>
<div class="card">
    <h2>افزودن music to playlist جدید</h2>
    <form action="../../../controller/playlist_music/insertplaylist_music.php" method="post" enctype="multipart/form-data">
        <label>music</label>
        <input type="text" name="music_id" placeholder="e.g.: Jigsaw falling into places " required>
               <label>playlist</label>
        <input type="text" name="playlist_id" placeholder="e.g.: Gym Hardcore " required>

        <button type="submit">ذخیره</button>
    </form>
</div>
</body>
</html>
