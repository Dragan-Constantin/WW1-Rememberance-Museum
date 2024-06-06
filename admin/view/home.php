


<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
            class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
</div>

<!-- Content Row -->
<div class="row">


<!-- Volunteers () Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Volunteers</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $volunteerCount ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-hands-helping fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Candidates () Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-success shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                        Candidates</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800"><?= $candidateCount ?></div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-user-tie fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- Events () Card -->
<div class="col-xl-3 col-md-6 mb-4">
    <div class="card border-left-info shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Events (This Month)</div>
                    <div class="h5 mb-0 font-weight-bold text-gray-800">10</div>
                </div>
                <div class="col-auto">
                    <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Shop Information Card -->
<div class="col-xl-6 col-md-12 mb-4">
    <div class="card border-left-warning shadow h-100 py-2">
        <div class="card-body">
            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">Business Hours</div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Day of the week</th>
                        <th>Business Hours</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    // Regrouper les jours consécutifs avec les mêmes heures d'ouverture
                    $groupedDays = [];
                    foreach ($businessHours as $hours) {
                        if ($hours['closed']) {
                            continue; // Passer aux prochains jours si celui-ci est fermé
                        }

                        $key = $hours['open_time'] . '-' . $hours['close_time'];
                        if (!isset($groupedDays[$key])) {
                            $groupedDays[$key] = [];
                        }
                        $groupedDays[$key][] = $hours['day'];
                    }

                    // Afficher les jours regroupés
                    foreach ($groupedDays as $key => $days) {
                        $times = explode('-', $key);
                        $openTime = substr($times[0], 0, 5); // Extraire les deux premiers caractères (heures et minutes)
                        $closeTime = substr($times[1], 0, 5); // Extraire les deux premiers caractères (heures et minutes)
                        echo '<tr><td>' . implode(', ', $days) . '</td><td>' . $openTime . ' - ' . $closeTime . '</td></tr>';
                    }

                    // Afficher les jours fermés
                    $closedDays = array_column(array_filter($businessHours, function($hours) {
                        return $hours['closed'];
                    }), 'day');
                    if (!empty($closedDays)) {
                        echo '<tr><td>' . implode(', ', $closedDays) . '</td><td>Closed</td></tr>';
                    }
                    ?>
                </tbody>
            </table>
            <a href="business-hours" class="btn btn-warning mt-2">Modify</a>
        </div>
    </div>
</div>

    </div>

