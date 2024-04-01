      // Calling Function
      function pagi() {
        console.log("Selamat Pagi");
        console.log("Good Morning");
        console.log("Ohayou Gozaimasu");
        console.log("Buenos Dias");
      }
      pagi();
      pagi();
      pagi();

      // Return Value
      function pagi() {
        return "Semangat Pagi";
      }
      let salam = pagi();
      console.log(salam); // "Semangat Pagi"

      // Parameter & Argument;
      function pagi(siapa) {
        return "Semangat Pagi " + siapa;
      }
      console.log(pagi("Budi")); // Semangat Pagi Budi
      console.log(pagi("Joko")); // Semangat Pagi Joko
      console.log(pagi("Sari")); // Semangat Pagi Sari

      // Default Parameter
      function rata2(a = 10, b = 10, c = 10, d = 10) {
        let hasil = (a + b + c + d) / 4;
        return hasil;
      }
      let nilai1 = rata2();
      console.log(nilai1); // 10
      let nilai2 = rata2(20);
      console.log(nilai2); // 12.5
      let nilai3 = rata2(20, 5, 30);
      console.log(nilai3); // 16.25

      // Normal Function
      function kuadrat(a) {
        return a * a;
      }
      console.log(kuadrat(5)); // 25

      // Const Function
      const kuadrat2 = function (a) {
        return a * a;
      };
      console.log(kuadrat2(5)); // 25

      // Arrow Function
      const kuadrat3 = (a) => {
        return a * a;
      };
      console.log(kuadrat3(5)); // 25

      // Arrow Function
      const kuadrat4 = (a) => a * a;
      console.log(kuadrat4(5)); // 25

      // Arrow Function
      const kuadrat5 = (a) => a * a;
      console.log(kuadrat5(5)); // 25

      // Arrow Function
      const greeting = () => "Semangat Pagi";
      console.log(greeting()); // Semangat Pagi

      // Arrow Function
      const greeting2 = (kapan, siapa) => `Selamat ${kapan}, ${siapa}`;
      console.log(greeting2("Pagi", "Budi")); // Selamat Pagi, Budi

      // Arrow Function
      const greeting3 = (kapan = "Pagi", siapa = "Kawan") =>
        `Selamat ${kapan}, ${siapa}`;

      console.log(greeting3()); //  Selamat Pagi, Kawan
      console.log(greeting3("Sore")); //  Selamat Sore, Kawan
      console.log(greeting3("Malam", "Budi")); //  Selamat Malam, Budi