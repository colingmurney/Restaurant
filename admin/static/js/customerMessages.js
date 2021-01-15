const queryString = window.location.search;
const urlParams = new URLSearchParams(queryString);

const filter = urlParams.get("filter");
const filterSelect = document.getElementById("filter");
if (filter === "pending") {
  filterSelect.value = "pending";
} else if (filter === "replied") {
  filterSelect.value = "replied";
}

const search = urlParams.get("search");
document.getElementById("search").value = search;
