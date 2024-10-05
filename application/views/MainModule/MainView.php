<?=
// var_dump($_SESSION);die;
_headerLayout(['main-view'], 'EVENT | MAIN VIEW')
?>
<style>
    .border-line-left {
        border-left: 1px solid #80808045;
    }

    .border-line-right {
        border-right: 1px solid #80808045;
    }

    .display-content {
        display: contents;
    }

    .th_class {
        text-align: center;
    }

    .active_tab {
        color: #ffc632 !important;
    }

    .event-edit:hover {
        color: #800000 !important;
        transform: scale(1.3);
    }
</style>

<body style="background-color: #fbfbef;">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #800000;">
        <div class="container-fluid">
            <!-- Brand -->
            <a class="navbar-brand" href="#"> <img width="30" style="background-color: white;border-radius: 50%;" src="<?= IMG_LOGO ?>" alt=""></a>

            <!-- Toggler/collapsibe Button -->
            <button class="navbar-toggler" type="button" data-mdb-toggle="collapse" data-mdb-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fas fa-bars"></i>
            </button>

            <!-- Collapsible Content -->
            <div class="collapse navbar-collapse" id="navbarContent">
                <!-- Links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link tab-link  active_tab" data-content="home" id="nav_home" aria-current="page" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-link" data-content="event" id="nav_event" href="#">Event List</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-link" data-content="calendar" id="nav_calendar" href="#">Calendar</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link tab-link" data-content="contact" id="nav_contact" s href="#">Contact</a>
                    </li>
                </ul>

                <!-- Dropdown -->
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-mdb-toggle="dropdown" aria-expanded="false">
                            <img src="<?= base_url() ?>assets/user_profile/<?= _getUserProfile($_SESSION['username']) ?>" class="rounded-circle"
                                height="50" alt="Avatar" loading="lazy" />
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="#"><b><?= strtoupper($this->session->userdata('username')) ?></b></a></li>
                            <li><a class="dropdown-item" href="#">Account Settings</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" style="color:red" href="<?= base_url() ?>logout" id="" href="#">Logout</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php if (empty($user_data->Username)): ?>
        <!-- Button trigger modal -->
        <div class="container justify-content-center">
            <br>
            <br>
            <center>
                <i>Please setup your account before accessing this module</i><br>
                <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#newUserModal" data-mdb-backdrop="static">
                    New user Setup
                </button>
            </center>

            <!-- Modal -->
            <div class="modal fade" id="newUserModal" tabindex="-1" aria-labelledby="newUserModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">New User Setup</h5>
                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="#" method="post" id="newUserForm" enctype="multipart/form-data">
                            <div class="modal-body">

                                <div class="form-outline" data-mdb-input-init>
                                    <input class="form-control" id="formControlReadonly" type="text" value="<?= $_SESSION['email']  ?>" aria-label="readonly input example" readonly />
                                    <label class="form-label" for="formControlReadonly">Email</label>
                                </div>
                                <br>
                                <div class="form-outline " data-mdb-input-init>
                                    <input type="text" id="fname" name="fname" class="form-control user_setup_input" />
                                    <label class="form-label" for="fname"><span style="color : red">*</span> First Name</label>
                                </div>
                                <br>
                                <div class="form-outline " data-mdb-input-init>
                                    <input type="text" id="mname" name="mname" class="form-control " />
                                    <label class="form-label" for="mname">Middle Name (Optional)</label>
                                </div>
                                <br>
                                <div class="form-outline " data-mdb-input-init>
                                    <input type="text" id="lname" name="lname" class="form-control user_setup_input" />
                                    <label class="form-label" for="typeText"><span style="color : red">*</span> Lastname</label>
                                </div>
                                <br>
                                <select class="form-select user_setup_input" name="gender" aria-label="Select gender">
                                    <option disabled selected>-- Select Gender --</option>
                                    <option value="1">Male</option>
                                    <option value="2">Female</option>
                                    <option value="3">Nonbinary and/or Intersex.</option>
                                </select>
                                <br>
                                <select class="form-select user_setup_input" name="course" aria-label="Select gender">
                                    <option disabled selected>-- Select Course --</option>
                                    <?php foreach ($courses as $key => $value): ?>
                                        <option value="<?= $value->CourseId ?>"><?= $value->CourseTitle . '(' . $value->CourseCode . ')' ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <br>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" value="" id="user_accept_policy" checked />
                                    <label class="form-check-label" for="user_accept_policy">I accept the terms and Privacy policy</label>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <!-- <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button> -->
                                <button type="sumbit" class="btn btn-primary">Save changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    <?php else: ?>
        <!-- Content -->
        <div class="container-fluid ">
            <div class="content_div justify-content-center" id="home_content">
                <div class="row">
                    <div class="col-md-3 border-line-right">
                        <div class="card m-3 p-2 ">
                            <div class="d-flex">
                                <img src="<?= base_url() ?>assets/user_profile/<?= _getUserProfile($_SESSION['username']) ?>" class="rounded-circle"
                                    height="50" alt="Avatar" loading="lazy" />
                                <div class="d-flex align-items-center w-100 ps-3">
                                    <div class="w-100">
                                        <span class="d-block mb-1"><?= empty(_getUserFullName($_SESSION['username'])) ? 'default_user.jpg' : _getUserFullName($_SESSION['username']) ?></span ?>
                                        <span class="text-muted small">College of Computer Studies</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card m-3 p-2">
                            <center>
                                <h6>MY EVENT</h6>
                            </center>
                            <hr>
                            <div id="home_event_list_join">
                                <ol class="list-group list-group-light list-group-numbered">
                                    <?php foreach ($my_event as $key => $value): ?>
                                    <li class="list-group-item d-flex justify-content-between align-items-start">
                                        <div class="ms-2 me-auto">
                                            <div class="fw-bold"><?= $value->EventName ?></div>
                                            <p><?= date('M j, Y h A', strtotime($value->EventStart)) ?></p>
                                        </div>
                                        <a target="_blank" href="<?= base_url() ?>MainModule/viewEvent/<?= $value->EventId ?>"><span class="badge badge-primary rounded-pill">view event</span></a>
                                    </li>
                                   <?php endforeach; ?>
                                </ol>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="card-body border-bottom pb-2 shadow-lg m-3 p-5" style="border-radius: 14px;background-color: white">
                                <div class="d-flex">
                                    <img src="<?= base_url() ?>assets/user_profile/<?= _getUserProfile($_SESSION['username']) ?>" class="rounded-circle "
                                        height="50" alt="Avatar" loading="lazy" />
                                    <div class="d-flex align-items-center w-100 ps-3">
                                        <div class="w-100">
                                            <div data-mdb-input-init class="form-outline w-100">
                                                <textarea class="form-control" id="textAreaExample" rows="2"></textarea>
                                                <label class="form-label" for="textAreaExample">What's happening</label>
                                            </div>
                                            <div class="m-3">
                                                <button type="button" style="float: inline-end;" class="btn btn-primary btn-sm">Post</button>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <br>
                            <!-- all news feed here -->
                            <div class="row mt-5 shodow-lg  display-content" id="home_content_feed"></div>
                            <div>
                                <center><a class="btn btn-primary" id="load_more">Load more feed</a></center>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 border-line-left"></div>
                </div>
            </div>
            <div class="content_div mt-2" id="event_content" style="display: none;">
                <?php if (!empty(_getWorkgroupAccess('ViewEvent'))): ?>
                    <div id="event_list_div" class="card m-3">
                        <div class="card-header p-3">
                            <span><b>EVENT LIST</b></span>
                            <?php if (!empty(_getWorkgroupAccess('CreateEvent'))): ?>
                                <span style="float: right;"> <button class="btn btn-success btn-sm" id="create_event"><i class="far fa-calendar-plus"></i></button></span>
                            <?php endif; ?>
                        </div>
                        <div class="card-body">
                            <table class="table  table-hover">
                                <thead class="bg-light table-light">
                                    <tr>
                                        <th class="th_class">EVENT NAME</th>
                                        <th class="th_class">EVENT START</th>
                                        <th class="th_class">ORGANIZER</th>
                                        <th class="th_class">CAPACITY</th>
                                        <th class="th_class">EVENT STATUS</th>
                                        <th class="th_class">REGISTRATION DEADLINE</th>
                                        <th class="th_class">ACTION</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($event_list as $key => $value) : ?>
                                        <tr class="hover_event_list">
                                            <td class="row">
                                                <div class="col-md-1">
                                                    <?php if (in_array($_SESSION['username'], [$value->EventOrganizer, $value->CreatedBy]) && _getDateStatus($value->EventReservationEnd)  ==  0): ?>
                                                        <i class="fas fa-edit event-edit" data-mdb-ripple-init
                                                            data-mdb-tooltip-init
                                                            data-mdb-html="true"
                                                            title="Edit"></i>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="col-md-10">
                                                    <div class="d-flex align-items-center">
                                                        <div class="ms-3">
                                                            <p class="fw-bold mb-1"><?= strtoupper($value->EventName) ?></p>
                                                            <p class="text-muted mb-0"> <?= $value->Description ?></p>

                                                        </div>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <div class="ms-3">
                                                        <p class="fw-normal mb-1">Start :<?= date('M j, Y hA', strtotime($value->EventStart));  ?> </p>
                                                        <!-- <p class="fw-normal mb-1">End : <?= date('M j, Y', strtotime($value->EventEnd));  ?></p> -->
                                                        <p class="text-muted mb-0">Location : <?= $value->LocationName ?></p>
                                                    </div>
                                                </div>
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img
                                                        src="<?= base_url() ?>assets/user_profile/<?= _getUserProfile($value->EventOrganizer) ?>"
                                                        alt=""
                                                        style="width: 45px; height: 45px"
                                                        class="rounded-circle shadow-sm" />
                                                    <div class="ms-3">
                                                        <p class="fw-bold mb-1"><?= strtoupper(_getUserFullName($value->EventOrganizer)) ?></p>
                                                        <p class="text-muted mb-0"><?= _getUserRole($value->EventOrganizer) ?></p>
                                                    </div>
                                                </div>


                                            </td>
                                            <td>
                                                <center><?= $value->AttendeeCount . '/' . $value->EventSlot ?></center>
                                            </td>
                                            <td>
                                                <?= _getStatusBadge($value) ?>
                                            </td>
                                            <td>
                                                <?php if (_getDateStatus($value->EventReservationEnd)  ==  0):

                                                    if (_getDateStatus($value->EventReservationStart) == 1):
                                                ?>
                                                        <center><?= date('M j, Y', strtotime($value->EventReservationEnd));  ?></center>
                                                    <?php
                                                    else:
                                                    ?>
                                                        <center>--</center>
                                                    <?php
                                                    endif;
                                                else: ?>
                                                    <center>
                                                        <button type="button" class="btn btn-secondary btn-sm btn-rounded">
                                                            Closed
                                                        </button>
                                                    </center>
                                                <?php endif; ?>

                                            </td>
                                            <td>
                                                <?php if (_getDateStatus($value->EventReservationEnd)  ==  1):  ?>
                                                    <button type="button" class="btn btn-primary btn-sm btn-rounded view_event" data-start="<?= _getDateStatus($value->EventReservationStart) ?>" data-status="0" data-end="<?= _getDateStatus($value->EventReservationEnd) ?>" data-rowdata="<?= base64_encode(json_encode($value)) ?>" data-reservedata="<?= $value->ReserveData ?>" data-eventid="<?= $value->EventId ?>">
                                                        Participants
                                                    </button>
                                                <?php else: ?>
                                                    <button type="button" class="btn <?= _getDateStatus($value->EventReservationStart) == 1 ? 'btn-success' : 'btn-primary' ?> btn-sm btn-rounded view_event" data-start="<?= _getDateStatus($value->EventReservationStart) ?>" data-status="1" data-end="<?= _getDateStatus($value->EventReservationEnd) ?>" data-rowdata="<?= base64_encode(json_encode($value)) ?>" data-reservedata="<?= $value->ReserveData ?>" data-eventid="<?= $value->EventId ?>">
                                                        <?= _getDateStatus($value->EventReservationStart) == 1 ? 'RESERVE NOW' : 'Start Soon'  ?>
                                                    </button>

                                                <?php endif; ?>



                                            </td>
                                        </tr>
                                    <?php endforeach; ?>

                                </tbody>
                            </table>
                            <center>
                                <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#viewEventModal" data-mdb-backdrop="static" hidden>

                                </button>
                            </center>

                            <!-- Modal -->
                            <div class="modal fade" id="viewEventModal" tabindex="-1" aria-labelledby="viewEventModalLabel" aria-hidden="true">
                                <div class="modal-dialog  modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel"></h5>
                                            <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <!-- <form action="#" method="post" id="newUserForm" enctype="multipart/form-data"> -->
                                        <div class="modal-body">

                                            <div id="event_description" class="mb-3 card p-3" style="background-color: beige;"></div>
                                            <hr>
                                            <div id="attendees_list">
                                                <h5>Attendees :</h5>
                                                <table id="attendees_list_table" class="table-striped">
                                                    <thead>
                                                        <tr>
                                                            <th>ID</th>
                                                            <th>NAME</th>
                                                            <th>name</th>
                                                            <th>Reserved date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="attendees_list_body">

                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="modal-footer" id="reserve_event_slot_div">
                                            <!-- <button type="button" class="btn btn-secondary" data-mdb-dismiss="modal">Close</button> -->
                                            <!-- <button type="sumbit" class="btn btn-primary">Save changes</button> -->
                                        </div>
                                        <!-- </form> -->
                                    </div>
                                </div>
                            </div>


                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-primary" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#editEventModal" hidden>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editEventModalLabel">Edit Event</h5>
                                            <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">...</div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button> -->
                                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Delete</button>
                                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end edit event -->

                            <button type="button" class="btn btn-primary" data-mdb-ripple-init data-mdb-modal-init data-mdb-target="#addEventModal" hidden>
                            </button>
                            <!-- Modal -->
                            <div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="addEventModalLabel">Add Event</h5>
                                            <button type="button" class="btn-close" data-mdb-ripple-init data-mdb-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">...</div>
                                        <div class="modal-footer">
                                            <!-- <button type="button" class="btn btn-secondary" data-mdb-ripple-init data-mdb-dismiss="modal">Close</button> -->
                                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Delete</button>
                                            <button type="button" class="btn btn-primary" data-mdb-ripple-init>Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                <?php else: ?>
                    <br>
                    <center>no access for this tab</center>
                <?php endif; ?>
            </div>
            <div class="content_div" id="calendar_content" style="display: none;">
                <div id="calendar">cale</div>
            </div>
        </div>
    <?php endif; ?>
    <script>
        var new_user = `<?= empty($user_data->Username) ? 1 : 0 ?>`;
        var username = `<?= $_SESSION['username'] ?>`;
    </script>

    <?= _footerLayout(['main-view']) ?>

    <script>
        $(document).ready(function() {

            if (new_user == 1) {
                $('#newUserModal').modal('show');
            }

            var content = sessionStorage.getItem("nav" + username);
            if (content !== null) {
                $(".content_div").hide();
                $('.tab-link').removeClass('active_tab');
                $('#nav_' + content).addClass('active_tab');

                $("#" + content + "_content").show();
            } else {
                console.log('Content does not exist in sessionStorage');
            }

        })
    </script>
    <?php if (!empty($user_data->Username)): ?>
        <script src="<?php echo base_url('assets/js/main-view-home.js'); ?>"></script>
        <script src="<?php echo base_url('assets/js/event-list.js'); ?>"></script>
    <?php endif; ?>
</body>

</html>