// script που παίρνει data από το api που βρίσκεται στο φάκελο api/Api.php και μετατρέπει τα data  σε UI friendly booking form για να κλείσει ο χρήστης εισητήρια

const createDivs = (parent, label) => {
  if (!label) {
    const createdDiv = document.createElement("div");
    createdDiv.classList = "formRow";
    createdDiv.appendChild(parent);
    return createdDiv;
  }

  const inner = document.createElement("label");
  inner.classList = "genericLabel";
  inner.innerText = label;

  const createdDiv = document.createElement("div");
  createdDiv.classList = "formRow";
  createdDiv.appendChild(inner);
  createdDiv.appendChild(parent);

  return createdDiv;
};

function checkSeats(data) {
  return data === null ? [] : data.split(",");
}

fetch("http://localhost/cinemaProject/class/api/Api.php")
  .then((response) => response.json())
  .then((data) => {
    const valuesOfData = Object.values(data);

    valuesOfData.map((V, i) => {
      const selectorForHours = document.createElement("select");
      selectorForHours.name = "hour";
      selectorForHours.id = i;

      const showsId = V.id;

      const showsIdDiv = document.createElement("input");
      showsIdDiv.readOnly = true;
      showsIdDiv.innerText = showsId;
      showsIdDiv.value = showsId;
      showsIdDiv.name = "showid";
      showsIdDiv.classList = "formInputHidden";

      const name = V.title;

      
      const date = V.startingDate;
      let startingDate =new Date(date).toDateString();


      const playinhours = V.playinghours.split(",").forEach((e, i) => {
        const option = document.createElement("option");
        option.value = e;
        option.innerText = e;

        selectorForHours.appendChild(option);
        selectorForHours.classList = "genericInput";
      });

      const form = document.createElement("form");
      form.method = "post";
      form.action = "../class/Includes/booking.php";
      form.classList = "bookingFormCnt";

      const btn = document.createElement("button");
      btn.type = "submit";
      btn.innerText = "submit";
      btn.classList = "blueBtn center";

      const movieName = document.createElement("input");
      movieName.readOnly = true;
      movieName.disabled;
      movieName.name = "movieName";
      movieName.value = name;
      movieName.placeholder = name;
      movieName.classList = "genericInput";

      const dateInput = document.createElement("input");
      dateInput.type = "text";
      dateInput.name = "date";
      dateInput.classList = "genericInput";
      dateInput.placeholder = startingDate;
      dateInput.readOnly =true;

      const layoutBtn = document.createElement("a");
      layoutBtn.innerText = "choose a seat";
      layoutBtn.href = "#";
      layoutBtn.classList = "whiteBtn";
      layoutBtn.id = "chooseASeat";

      layoutBtn.addEventListener("click", (e) => {
        e.preventDefault();
        const showLayout = document.getElementById("hiddenLayout");
        showLayout.classList.toggle("open");
      });

      const hiddenLayout = document.createElement("table");
      hiddenLayout.class = "hiddenLayout";
      hiddenLayout.id = "hiddenLayout";

      const seatCounts = V.seat_count;
      const cols = seatCounts / 10;
      const rows = seatCounts / cols;
      const numberOfSeats = V.seatno;

      const numberOfTickets = document.createElement("input");
      numberOfTickets.classList = "genericInput";
      numberOfTickets.readOnly = true;

      const totalAmount = document.createElement("input");
      totalAmount.classList = "genericInput";
      totalAmount.readOnly = true;

      const seatsBoughts = document.createElement("input");
      seatsBoughts.classList = "genericInput";
      seatsBoughts.readOnly = true;

      const priceOfTicket = 8;

      const checkboxTotal = () => {
        var seat = [];
        var seatBought = [];

        if (numberOfSeats) {
          seat = seat.concat(numberOfSeats.split(","));
        }

        const checkedInput = document.executeQuerySelectorAll(
          "input[name=seat]:checked"
        );

        checkedInput.forEach((e) => {
          seat.push(e.id);
          seatBought.push(e.id);
        });

        const st = seat.length;
        const sb = seatBought.length;
        seatsBoughts.innerText = seatBought.join(",");
        seatsBoughts.value = seatBought.join(",");
        seatsBoughts.name = "seatsBought";
        seatBought.readOnly = true;

        totalNumberOfSeats.value = seat;
        totalNumberOfSeats.innerText = seat.join(",");
        totalNumberOfSeats.value = seat.join(",");

        numberOfTickets.innerText = sb;
        numberOfTickets.value = sb;
        numberOfTickets.name = "numberOfTickets";
        numberOfTickets.readOnly = true;

        // euro symbol
        totalAmount.innerText = ` ${sb * priceOfTicket}`;
        totalAmount.value = sb * priceOfTicket;
        totalAmount.name = "totalAmount";
        totalAmount.readOnly = true;
      };

      const splitSeats = checkSeats(numberOfSeats);

      for (let i = 0; i <= cols; i++) {
        const tr = document.createElement("tr");

        for (let j = 0; j <= rows; j++) {
          const td = document.createElement("td");
          const checkbox = document.createElement("input");
          checkbox.type = "checkbox";
          checkbox.name = "seat";
          checkbox.classList = `seat-${showsId}`;
          checkbox.addEventListener("click", checkboxTotal);
          checkbox.id = `${i}${j}`;

          splitSeats.forEach((e) => {
            if (checkbox.id == e) {
              checkbox.disabled = true;
              checkbox.classList.add("used");
            }
            return;
          });

          td.append(checkbox);
          tr.appendChild(td);
        }

        hiddenLayout.appendChild(tr);
      }

      const totalNumberOfSeats = document.createElement("input");
      totalNumberOfSeats.readOnly = true;
      totalNumberOfSeats.id = "num";
      totalNumberOfSeats.classList = "formInputHidden";
      totalNumberOfSeats.name = "seats";

      const displayDynamicForms = document.getElementById(
        "displayDynamicForms"
      );

      const movieInfoShown = createDivs(movieName, "Movie Name");

      const totalAmountSHown = createDivs(totalAmount, "Total Amount");

      const dateInfoShown = createDivs(dateInput, "Show Date");

      const hoursAvailableShown = createDivs(selectorForHours, "Showing Times");

      const numberOfTicketsShown = createDivs(numberOfTickets, "No. Tickets");

      const seatsBoughtShown = createDivs(seatsBoughts, "Boughted Seats");

      const submitBtn = createDivs(btn);

      const layoutBtnShown = createDivs(layoutBtn);

      const screenCnt = document.createElement("div");
      screenCnt.classList = "screenCnt";

      const screenDiv = document.createElement("div");
      screenDiv.classList = "screen";
      screenDiv.innerText = "Screen";

      screenCnt.appendChild(screenDiv);
      screenCnt.appendChild(hiddenLayout);

      displayDynamicForms.appendChild(form);
      form.appendChild(movieInfoShown);
      form.appendChild(hoursAvailableShown);
      form.appendChild(dateInfoShown);
      form.appendChild(numberOfTicketsShown);
      form.appendChild(totalAmountSHown);
      form.appendChild(seatsBoughtShown);
      // form.appendChild(layoutBtnShown);
      form.appendChild(screenCnt);
      form.appendChild(showsIdDiv);
      form.appendChild(totalNumberOfSeats);
      form.appendChild(submitBtn);

    });
  });
