<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Sofia, Fernando, Matt">
    <meta name="description" content="archery database system">
    <meta name="keywords" content="HTML5, arrow score input">
    <title>Add End Scores</title>
</head>
<body>
    <div id="add_end">
        <h2>Enter Arrow Scores</h2>
        <form action="../process/process_ends.php" method="POST">

        <label for="action_type">Action:</label>
        <select name="action_type" id="action_type" required>
            <option value="">Select:</option>
            <option value="insert">Insert New Score</option>
            <option value="update">Update Existing Score</option>
        </select>

        <!-- Only required for update -->
        <label for="endID">End ID (only if updating):</label>
        <input type="number" name="End_ID" min="1">


            <label for="End_ID">End ID:</label>
            <input type="number" name="End_ID" required><br><br>

            <div id="keypad">
                <label>Enter Arrow Scores (X = 10):</label><br>
                <input type="text" id="arrow_input" name="arrow_input" readonly><br><br>
                <button type="button" onclick="addScore('X')">X</button>
                <button type="button" onclick="addScore('9')">9</button>
                <button type="button" onclick="addScore('8')">8</button>
                <button type="button" onclick="addScore('7')">7</button>
                <button type="button" onclick="addScore('6')">6</button>
                <button type="button" onclick="addScore('5')">5</button>
                <button type="button" onclick="addScore('4')">4</button>
                <button type="button" onclick="addScore('3')">3</button>
                <button type="button" onclick="addScore('2')">2</button>
                <button type="button" onclick="addScore('1')">1</button>
                <button type="button" onclick="addScore('0')">0</button>
                <button type="button" onclick="clearScore()">Clear</button>
            </div>

            <input type="submit" value="Submit Scores">
        </form>
    </div>

    <script>
        let scores = [];

        function addScore(val) {
            if (scores.length >= 6) return;
            scores.push(val === 'X' ? 10 : parseInt(val));
            document.getElementById('arrow_input').value = scores.join(', ');
        }

        function clearScore() {
            scores = [];
            document.getElementById('arrow_input').value = '';
        }

        // Before form submit, append each arrow as POST fields
        document.querySelector('form').addEventListener('submit', function (e) {
            scores.forEach((val, index) => {
                const hidden = document.createElement('input');
                hidden.type = 'hidden';
                hidden.name = 'Arrow' + (index + 1);
                hidden.value = val;
                this.appendChild(hidden);
            });
        });
    </script>
</body>
</html>
