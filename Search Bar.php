<style  type="text/css">
    .label-bg{
        background-color: rgba(122, 241, 248, 0.7);
    }
</style>

<div class="p-2">
    <form action="Includes/Search Results.Inc.php" method="post" role="form">
        <div class="form-group d-flex justify-content-around">
            <div>
                <strong class="p-1 label-bg">Location: </strong>

                <span class="m-2"></span>

                <?php include_once "Locations.php" ?>
            </div>

            <div>
                <strong class="p-1 label-bg">No. of Seats: </strong>

                <span class="m-2"></span>

                <select class="pl-3 pr-3" name="seats">
                    <option value="1"> 1 </option>
                    <option value="2"> 2 </option>
                    <option value="3"> 3 </option>
                    <option value="4"> 4 </option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary" name="search-submit">
                <span class="pl-1 pr-3 txtsize">
                    <span class="material-icons">search</span>Search
                </span>
            </button>
        </div>
    </form>
</div>