<!DOCTYPE html>
<html>

<head>
    <title>Health Insurance Form</title>
    <link rel="stylesheet" href="insurance.css">
    <style>
        body {
            background-image: url("images/car.png");
            background-repeat: no-repeat;
            background-size: cover;
        }

        select {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
            color: #333;
            width: 200px;
        }

        input[type="text"],
        input[type="number"] {
            padding: 8px;
            font-size: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            background-color: #f9f9f9;
            color: #333;
            width: 200px;
        }

        input[type="radio"] {
            margin-right: 5px;
        }

        table {
            border-collapse: collapse;
        }

        table td {
            padding: 8px;
        }

        button {
            padding: 10px 20px;
            font-size: 16px;
            color: #fff;
            border: none;
            border-radius: 10px;
            cursor: pointer;
            background-color: gray;
        }

        button:hover {
            background-color: rgb(167, 167, 167);
        }
    </style>
</head>

<body>
    <?php include('navbar2.php'); ?>
    <div class="transfer-container" style="height: 760px;background-color:rgb(167,167,167,0.6);">
        <h2 class="font-weight-bold mb-4">Vehicle Insurance Application</h2>
        <hr>
        <table style="width: 50%;">
            <tr>
                <td>
                    <p class="transfer-containerp">Select Vehicle Type:</p></label>
                </td>
                <td>
                    <select id="vehicle">
                        <option value="basic">2 wheeler</option>
                        <option value="standard">3 wheeler</option>
                        <option value="premium">4 wheeler</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="transfer-containerp">Coverage Plans:</p></label>
                </td>
                <td>
                    <select id="insurancePlan">
                        <option value="basic">Basic (1 lac)</option>
                        <option value="standard">Standard (3 lacs)</option>
                        <option value="premium">Premium (7 lacs)</option>
                        <option value="premium">Titan (15 lacs)</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="transfer-containerp">Full Name:</p>
                </td>
                <td><input type="text" id="fullName" placeholder="Enter your full name" required></td>
            </tr>
            <tr>
                <td>
                    <p class="transfer-containerp">Age: </p>
                </td>
                <td><input type="number" id="age" placeholder="Enter your age" required></td>
            </tr>
            <tr>
                <td>
                    <p class="transfer-containerp">Has your vehicle been in an accident before?:</p>
                </td>
                <td>
                    <input type="radio" id="chronicYes" name="chronicDisease" value="yes">
                    <label for="chronicYes">Yes</label>
                    <input type="radio" id="chronicNo" name="chronicDisease" value="no" checked>
                    <label for="chronicNo">No</label>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="transfer-containerp">Is your vehicle older than 5 years?:</p>
                </td>
                <td>
                    <input type="radio" id="smokeYes" name="cigarettes" value="yes">
                    <label for="smokeYes">Yes</label>
                    <input type="radio" id="smokeNo" name="cigarettes" value="no" checked>
                    <label for="smokeNo">No</label>
                </td>
            </tr>
            <tr>
                <td>
                    <p class="transfer-containerp">Tenure:</p>
                </td>
                <td>
                    <select id="tenure" required>
                        <option value="3">3 years</option>
                        <option value="5">5 years</option>
                        <option value="10">10 years</option>
                        <option value="15">15 years</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>
                    <button type="submit" onclick="calculatePolicy()">Calculate Policy</button>
                </td>
            </tr>
        </table>
        </form>
        <table>
            <tr>
                <td>
                    <p id="policyAmount" class="transfer-containerp"></p>
                </td>
                <td>
                    <p id="policyAmountr" class="transfer-containerp"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <p id="monthlyPremium" class="transfer-containerp"></p>
                </td>
                <td>
                    <p id="monthlyPremiumr" class="transfer-containerp"></p>
                </td>
            </tr>
            <tr>
                <td>
                    <button onclick="bruh()">Apply</button>
                </td>
            </tr>
        </table>
    </div>
</body>
<script>
    function calculatePolicy() {
        const insurancePlan = document.getElementById("insurancePlan").value;
        let policyAmount = 0;
        let defaultPremium = 0;

        if (insurancePlan === "basic") {
            policyAmount = 100000;
            defaultPremium = 250;
        } else if (insurancePlan === "standard") {
            policyAmount = 300000;
            defaultPremium = 400;
        } else if (insurancePlan === "premium") {
            policyAmount = 7000000;
            defaultPremium = 600;
        } else if (insurancePlan === "titan") {
            policyAmount = 1500000;
            defaultPremium = 800;
        }

        const age = parseInt(document.getElementById("age").value);
        const cigarettes = document.querySelector('input[name="cigarettes"]:checked').value;
        const chronicDisease = document.querySelector('input[name="chronicDisease"]:checked').value;

        let monthlyPremium = defaultPremium;

        if (age >= 60) {
            monthlyPremium += 50;
        }

        if (cigarettes === "yes") {
            monthlyPremium += 80;
        }

        if (chronicDisease === "yes") {
            monthlyPremium += 150;
        }

        document.getElementById("policyAmount").innerHTML = "Policy Amount: ";
        document.getElementById("policyAmountr").innerHTML = "₹" + policyAmount;
        document.getElementById("monthlyPremium").innerHTML = "Monthly Premium: ";
        document.getElementById("monthlyPremiumr").innerHTML = "₹" + monthlyPremium;
    }

    function bruh(){
        window.alert("Your policy has been successfully applied for!");
        window.location.href = "vehicleinsurance.php";
    }
</script>

</html>