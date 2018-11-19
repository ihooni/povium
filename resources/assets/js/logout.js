import Axios from "axios"

if (document.querySelector("#globalnav .sign-out")) {

	let signOutButton = document.querySelector("#globalnav .sign-out")

	signOutButton.addEventListener("click", function(e) {

		e.preventDefault()

		Axios({
			method: 'post',
			url: '/logout'
		})
		.then(function(response) {
			let data = response.data
			if (data !== "") {
				location.replace(data["redirect"])
			}
		})

	})

}
