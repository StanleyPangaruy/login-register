<script type="text/javascript">
    function submitData() {
        var name = document.getElementById("name").value;
        var username = document.getElementById("username").value;
        var password = document.getElementById("password").value;
        var action = document.getElementById("action").value;

        var data = new URLSearchParams();
        data.append('name', name);
        data.append('username', username);
        data.append('password', password);
        data.append('action', action);

        fetch('function.php', {
            method: 'POST',
            body: data,
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            }
        })
        .then(response => response.text())
        .then(response => {
            alert(response);
            if (response === "Login Successful") {
                window.location.reload();
            }
        })
        .catch(error => {
            alert('An error occurred: ' + error);
        });
    }
</script>
