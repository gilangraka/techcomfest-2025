const cards = document.querySelectorAll(".card");
const titles = document.querySelectorAll(".title");

const dateNow = new Date();

titles.forEach((title, index) => {
    const dateText = title.innerText;

    const [day, month, year] = dateText.split(" ");

    const months = {
        Januari: 0,
        Februari: 1,
        Maret: 2,
        April: 3,
        Mei: 4,
        Juni: 5,
        Juli: 6,
        Agustus: 7,
        September: 8,
        Oktober: 9,
        November: 10,
        Desember: 11,
    };

    const parsedDate = new Date(year, months[month], day);

    if (!isNaN(parsedDate.getTime())) {
        if (parsedDate < dateNow) {
            cards[index].classList.add("before:border-[#263B81]");
            title.classList.add("before:border-[#263B81]");
        } else if (parsedDate.toDateString() === dateNow.toDateString()) {
            cards[index].classList.add("before:border-[#263B81]");
            title.classList.add("before:border-[#263B81]");
        }
    }
});
