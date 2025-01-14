<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Event Confirmation</title>
    <link type="text/css" rel="stylesheet" href="<?= base_url('assets/css/style.css'); ?>">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <div class="container">
        <div class="title">BRI Microfinance Outlook 2025</div>
        <p>Empowering the People's Economy: A pillar for Achieving Inclusive & Sustainable Growth</p>
        <br/>
        <form action="<?= site_url('attendance/submit'); ?>" method="post">
            <div class="form-group">
                <span class="form-label">Apakah anda ingin mengikuti acara ini?</span>
                &nbsp;&nbsp;
                <div class="is_attending-answer">
                    <!-- Radio buttons for gender selection -->
                    <input type="radio" name="is_attending" id="is_attending_yes" value="yes">
                    <input type="radio" name="is_attending" id="is_attending_no" value="no">            
                    <div class="category">
                        <!-- Label for Ya -->
                        <label for="is_attending_yes">
                        <span class="dot attending yes"></span>
                        <span class="is_attending">Ya</span>
                        </label>
                        <!-- Label for Tidak -->
                        <label for="is_attending_no">
                        <span class="dot attending no"></span>
                        <span class="is_attending">Tidak</span>
                        </label>                
                    </div>
                </div>
            </div>

            <div id="is_adding_guests-question" style="display: none; margin-top: 20px;">
                <div class="form-group">
                    <span class="form-label">Ada tambahan undangan?</span>
                    &nbsp;&nbsp;
                    <div class="is_adding_guests-answer">
                        <!-- Radio buttons for gender selection -->
                        <input type="radio" name="is_adding_guests" id="is_adding_guests_yes" value="yes">
                        <input type="radio" name="is_adding_guests" id="is_adding_guests_no" value="no">            
                        <div class="category">
                            <!-- Label for Ya -->
                            <label for="is_adding_guests_yes">
                            <span class="dot adding guests yes"></span>
                            <span class="is_adding_guests">Ya</span>
                            </label>
                            <!-- Label for Tidak -->
                            <label for="is_adding_guests_no">
                            <span class="dot adding guests no"></span>
                            <span class="is_adding_guests">Tidak</span>
                            </label>                
                        </div>
                    </div>
                </div>
            </div>
        
            <div id="guests-form" style="display: none; margin-top: 20px;">
                <div class="table-responsive">
                    <table id="add_table" class="table" data-toggle="table" data-mobile-responsive="true">
                        <thead>
                            <tr>
                                <th>Nama Lengkap</th>
                                <th>Jabatan</th>
                                <th>Instansi</th>                                        
                                <th>
                                    <button type="button" class="btn btn-outline-success" id="add_row" class="add"> tambah </button>
                                </th>
                            </tr>
                        </thead>
                    <tbody>
                        <tr>
                            <td>
                                <input type="text" class="form-control" required="true">
                            </td>
                            <td>
                                <input type="text" class="form-control" required="true">
                            </td>
                            <td>
                                <input type="text" class="form-control" required="true">
                            </td>                                        
                            <td>
                                <button type="button" class="btn btn-outline-danger delete_row">hapus</button>
                            </td>
                        </tr>
                    </tbody>
                    </table>
                </div>
                <div id="warning" style="color: red; display: none;">*maksimal undangan sebanyak 3 orang</div>
            </div>

            <div id="btn-confirm" class="button" style="display: none; margin-top: 20px;">
                <input id="button" type="submit" value="Konfirmasi">
            </div>     
        </form>
    </div>

    <script>
        $(document).ready(function () {
            let guestsCount = 1;

            // Toggle attendee-question visibility
            $('input[name="is_attending"]').change(function () {
                if ($(this).val() === 'yes') {
                    $('#is_adding_guests-question').show();
                } else {
                    $('#is_adding_guests-question').hide();
                    $('#btn-confirm').show(); 
                }
            });

             // Toggle form visibility based on attendance selection
             $('input[name="is_adding_guests"]').change(function () {
                if ($(this).val() === 'yes') {
                    $('#guests-form').show();
                    $('#btn-confirm').show();                                         
                } else {
                    $('#guests-form').hide();  
                    $('#btn-confirm').show();                                          
                }
            });

            // Add guest row
            $('#add_row').click(function () {
                if (guestsCount >= 3) {
                    alert('Maximum 3 guests allowed.');
                    return;
                }

                const row = `
                    <tr>
                        <td><input type="text" name="guest_name[]" class="form-control" required></td>
                        <td><input type="text" name="guest_relation[]" class="form-control" required></td>
                        <td><input type="text" name="guest_contact[]" class="form-control" required></td>
                        <td><button type="button" class="btn delete_row">Hapus</button></td>
                    </tr>`;
                $("tbody").append(row);
                guestsCount++;
            });

            // Remove guest row
            $("body").on('click', '.delete_row', function () {
                $(this).closest('tr').remove();
                guestsCount--;
            });
        });
    </script>
</body>
</html>
