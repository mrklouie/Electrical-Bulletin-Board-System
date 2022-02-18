<style>


.container-of-all{
    width: 50vw;
    height: 50vh;
    background: #c4c4c4;
    display: grid;
    place-items: center;
}
    .container{
        width: 150px;
        height: 150px;
        background-color: #d3d3d3;
        border: 1px solid black;

    }

</style>
<div class="container-of-all">
<div class="container" onclick="upload()">
    <form action="upload.php" method="POST" enctype="multipart/form-data">
        <input type="file" id="upload-file" name="file" style="display: none;">
    <button type="submit" name="upload">upload here</button>
    </form>
</div>
</div>

<script type="text/javascript">

function upload(){
    document.querySelector('#upload-file').click();
}
</script>
