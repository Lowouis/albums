<div id="popup" class="position-absolute d-flex align-items-center justify-content-center">
    <form method="GET">

        <div class="col">
            <label class="p-2 m-1">Veuillez écrire le nouvel album : </label>
            <input class="form-control p-2 m-1" type="text" name="add_album">
            <button class="p-2 m-1 w-100 btn btn-success" type="submit" name="add_album">Confirmer</button>
        </div>
    </form>
</div>
<style>
    #popup{
        position: fixed !important;
        top: 50%;
        right: 50%;
        transform: translateX(50%) translateY(-50%);
        z-index: 100;
        background: antiquewhite;
        padding: 20px;
        border-radius: 10px;
    }

</style>
</div>
