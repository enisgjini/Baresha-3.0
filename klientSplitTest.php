<?php include "partials/header.php" ?>

<div class="main-panel">
    <div class="content-wrapper">
        <div class="container-fluid">
            <div class="container">
                <div class="card my-5 p-5">

                    <?php

                    // Get the main allocation percentages
                    $perqindja_e_klientit = 70;
                    $baresha_percentage = 30;

                    // Initialize an array to store additional allocations
                    $additional_allocations = array();

                    // Check if the form has been submitted
                    if (isset($_POST['submit'])) {
                        // Get the additional allocations from the form
                        $additional_allocations = $_POST['additional_allocations'];
                        //check if the $additional_allocations is string
                        if (gettype($additional_allocations) == "string") {
                            //if it is string, then convert it to array
                            $additional_allocations = array($additional_allocations);
                        }
                        // Iterate through the additional allocations
                        foreach ($additional_allocations as $allocation) {
                            // Check if the allocation is valid
                            if (isset($allocation['name']) && isset($allocation['percentage']) && is_numeric($allocation['percentage'])) {
                                // Print the allocation details
                                echo "<div class='row card my-3 px-3 py-2'><div class='col p-0 m-0'><h4>{$allocation['name']}</h4> <br> {$allocation['percentage']} </div></div>";
                                //subtract the value from $baresha_percentage
                                $perqindja_e_klientit -= $allocation['percentage'];
                            }
                        }
                    }


                    echo "<div class='row gap-5'>";
                    echo "<div class='col border border-1 shadow-3 rounded py-3'> <h4>Përqindja e BareshaNetwork <br><br>" . $baresha_percentage . " % </h5></div>";
                    echo "<div class='col border border-1 shadow-3 rounded py-3'> <h4>Perqindja e klientit <br><br>" . $perqindja_e_klientit . " % </h5></div></div><br><br> ";

                    // Print the final allocation percentages



                    ?>

                    <form method="post">
                        <label>Additional Allocations:</label><br>
                        <div id="allocations">
                            <div>
                                <label>Name:</label>
                                <input type="text" name="additional_allocations[0][name]" class="form-control">
                                <label>Percentage:</label>
                                <input type="text" name="additional_allocations[0][percentage]" class="form-control">
                            </div>
                        </div>
                        <br>
                        <button type="button" onclick="addAllocation()" class="btn btn-light border border-1 shadow-2">Add Allocation</button>
                        <input type="submit" name="submit" value="Submit" class="btn btn-light border border-1 shadow-2">
                    </form>

                    <script>
                        // Function to add additional allocations
                        function addAllocation() {
                            var allocations = document.getElementById("allocations");
                            var newAllocation = document.createElement("div");
                            newAllocation.innerHTML = '<label>Name:</label><input type="text" class="form-control" name="additional_allocations[' + allocations.childNodes.length + '][name]"><label>Percentage:</label><input type="text" class="form-control d-flex" name="additional_allocations[' + allocations.childNodes.length + '][percentage]"><br><button type="button" onclick="removeAllocation(this)" class="btn btn-light border border-1 shadow-2">Delete Allocation</button>';
                            allocations.appendChild(newAllocation);
                        }

                        function removeAllocation(el) {
                            el.parentNode.remove();
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include "partials/footer.php" ?>