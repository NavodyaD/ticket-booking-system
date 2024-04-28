<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="profilestyle.css">
</head>
<body>
    <section id="manageevents">
        <div class="eventedit">
            <form action="admin_quaries/editevent.php" method="post">
                <h2>Edit Events</h2>
                <div class="input">
                    <label>Enter Event ID</label>
                    <input type="number" id="eventid" name="eventid">
                </div>
                <div class="input">
                <label>What you need to edit?</label>
                <select name="eventeditdropdown" id="eventeditdropdown">
                    <option value="1">Event Name</option>
                    <option value="2">Event Price</option>
                    <option value="3">Event Ticket Amount</option>
                    <option value="4">Event Date</option>
                    <option value="5">Event Location</option>
                    <option value="6">Band</option>
                </select>
                </div>
                <div class="input">
                    <label>Enter New Value</label>
                    <input type="text" id="neweditvalue" name="neweditvalue">
                </div>
                <div>
                    <button  type="submit">Perform Edit</button>
                </div>
            </form>
            <form action="admin_quaries/editevent.php" method="post">
                <h2>Remove Events</h2>
                <div class="input">
                    <label>Enter Event ID</label>
                    <input type="number" id="eventid" name="eventid">
                </div>
                <div class="input">
                    <label>Admin Identification Code</label>
                    <input type="password" id="neweditvalue" name="neweditvalue">
                </div>
                <div>
                    <button  type="submit">Perform Removal</button>
                </div>
            </form>
        </div>
        <div class="eventedit">
            <form action="admin_quaries/editband.php" method="post">
                <h2>Edit Bands</h2>
                <div class="input">
                    <label>Enter Event ID</label>
                    <input type="number" id="bandid" name="bandid">
                </div>
                <div class="input">
                <label>What you need to edit?</label>
                <select name="bandeditdropdown" id="bandeditdropdown">
                    <option value="1">Band Name</option>
                    <option value="2">Players Count</option>
                    <option value="3">Band Type</option>
                    <option value="4">Band Price</option>
                    <option value="5">Band Phone Number</option>
                </select>
                </div>
                <div class="input">
                    <label>Enter New Value</label>
                    <input type="text" id="neweditvalue" name="neweditvalue">
                </div>
                <div>
                    <button  type="submit">Perform Edit</button>
                </div>
            </form>
        </div>
    </section>

    <section id="manageevents">
        <div class="eventedit">
            <form action="addpurchase.php" method="post">
                <h2>Edit Events</h2>
                <div class="input">
                    <label>Enter Event ID</label>
                    <input type="number" id="eventid" name="eventid">
                </div>
                <div class="input">
                <label>What you need to edit?</label>
                <select name="eventeditdropdown" id="eventeditdropdown">
                    <option value="1">Event Name</option>
                    <option value="2">Event Price</option>
                    <option value="3">Event Ticket Amount</option>
                    <option value="4">Event Date</option>
                    <option value="5">Event Location</option>
                    <option value="6">Band</option>
                </select>
                </div>
                <div class="input">
                    <label>Enter New Value</label>
                    <input type="text" id="neweditvalue" name="neweditvalue">
                </div>
                <div>
                    <button  type="submit">Perform Edit</button>
                </div>
            </form>
        </div>
        <div class="eventedit">
            <form action="addpurchase.php" method="post">
                <h2>Edit Bands</h2>
                <div class="input">
                    <label>Enter Event ID</label>
                    <input type="number" id="eventid" name="eventid">
                </div>
                <div class="input">
                <label>What you need to edit?</label>
                <select name="eventeditdropdown" id="eventeditdropdown">
                    <option value="1">Event Name</option>
                    <option value="2">Event Price</option>
                    <option value="3">Event Ticket Amount</option>
                    <option value="4">Event Date</option>
                    <option value="5">Event Location</option>
                    <option value="6">Band</option>
                </select>
                </div>
                <div class="input">
                    <label>Enter New Value</label>
                    <input type="text" id="neweditvalue" name="neweditvalue">
                </div>
                <div>
                    <button  type="submit">Perform Edit</button>
                </div>
            </form>
        </div>
    </section>
    
</body>
</html>