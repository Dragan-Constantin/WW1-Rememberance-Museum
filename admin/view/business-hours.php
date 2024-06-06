<!-- Shop Information Form -->
<div class="col-xl-6 col-md-12 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <form action="business-hours" method="POST">
                <?php
                $days = ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'];
                foreach ($days as $day) {
                    echo '
                    <div class="form-group">
                        <label for="'.$day.'_open">'.$day.' Opening Time</label>
                        <div class="row align-items-center">
                            <div class="col-4">
                                <input type="time" class="form-control" id="'.$day.'_open" name="'.$day.'[open]">
                            </div>
                            <div class="col-4">
                                <input type="time" class="form-control" id="'.$day.'_close" name="'.$day.'[close]">
                            </div>
                            <div class="col-4">
                                <button type="button" class="btn btn-danger" onclick="toggleDay(\''.$day.'\')" id="'.$day.'_toggle_btn">Close</button>
                            </div>
                            <!-- Ajouter un champ caché pour transmettre la valeur de closed -->
                            <input type="hidden" name="'.$day.'[closed]" id="'.$day.'_closed" value="0">
                        </div>
                    </div>';
                }
                ?>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</div>



<script>
function toggleDay(day) {
    const openField = document.getElementById(day + '_open');
    const closeField = document.getElementById(day + '_close');
    const toggleBtn = document.getElementById(day + '_toggle_btn');
    const isClosed = toggleBtn.classList.contains('btn-success');

    openField.disabled = isClosed;
    closeField.disabled = isClosed;

    if (isClosed) {
        toggleBtn.classList.remove('btn-success');
        toggleBtn.classList.add('btn-danger');
        toggleBtn.innerText = 'Close';
        document.getElementById(day + '_closed').value = 0;
    } else {
        toggleBtn.classList.remove('btn-danger');
        toggleBtn.classList.add('btn-success');
        toggleBtn.innerText = 'Open';
        document.getElementById(day + '_closed').value = 1;
    }
}
</script>
