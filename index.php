<?php include("includes/head.php"); ?>
<?php include("includes/config.php"); ?>

<body>
        <?php include("includes/mainmenu.php"); ?>

        <div class="main-section">

                <h1>DT209G</h1>
                <h2>Moment2</h2>
                <h3>Information om uppgiften</h3>

                <article>

                        <ul class="information">
                                <li>
                                        <p>Uppgiften går ut på att skapa en enklare webbplats med HTML, CSS och objektorienterad PHP.</p>
                                </li>
                                <li>
                                        <p>Att förstå hur en logisk och lättjobbad filstruktur underlättar vid utveckling och underhåll av applikationer.</p>
                                </li>
                                <li>
                                        <p>Att förstå hur anslutningar till MySQL- eller MariaDB-databaser fungerar med olika tekniker i PHP.</p>
                                </li>
                                <li>
                                        <p>Att kunna skapa en eller flera klasser eller funktioner för att sköta databasanslutning och databehandling.</p>
                                </li>
                                <li>
                                        <p>Att läsa in data från formulär, spara och radera data som lagras i en databas.</p>
                                </li>
                                <li>
                                        <p>Att kunna använda några vanliga SQL-kommandon såsom SELECT, INSERT, UPDATE och DELETE.</p>
                                </li>
                        </ul>

                        <div clas="reflections">
                                <h3>Mina reflektioner kring PHP</h3>
                                <p class="information">
                                        PHP har varit ett roligt och intressant språk att arbeta med.
                                        En av de största fördelarna är den enkla och relativt lättlästa syntaxen,
                                        vilket gör det snabbare att komma igång och bygga funktionalitet för webbapplikationer. <br><br>
                                        Dessutom finns många resurser och ett stort community att ta hjälp av när problem uppstår.

                                        <br><br>

                                        En av de största fördelarna med PHP är dess inbyggda funktioner för att hantera databasanslutningar,
                                        vilket gör det enkelt att koppla samman en webbsida med en databas.
                                        Att använda funktioner som mysqli_connect() eller PDO för att ansluta till databaser sparar tid och förenklar arbetsflödet
                                        jämfört med andra språk. Detta gör det till ett populärt val för utveckling av dynamiska webbsidor,
                                        som till exempel bloggar eller e-handelsplattformar.

                                        <br><br>

                                        Annan fördel är användningen av att länka in filer till sidorna, som exempelvis från "include"-mappen.
                                        Koden för vardera fil blir mindre och mer lättläst, samt går det smidigt att lokalisera sig mellan filerna.
                                </p>

                                <p class="information">
                                        Dock har arbetet med PHP inte varit helt problemfritt. En av de största frustrationen jag stötte på var när jag missade att stänga
                                        PHP-taggarna korrekt, vilket ledde till att koden inte fungerade som förväntat.
                                        I vissa fall, när jag missade tecken som "?>" eller ".",
                                        förlorade jag tid på att felsöka problem som egentligen hade att göra med syntax snarare än logik.
                                </p>

                                <p class="information">
                                        När jag jämför PHP med andra språk som JavaScript och C#, tycker jag att PHP är relativt lätt att förstå och använda för webbutveckling.
                                        I jämförelse med JavaScript, som är ett mer mångsidigt språk och även används på klientsidan för att skapa interaktiva webbsidor, känns PHP som ett mer "specialiserat" språk för webben.

                                        <br><br>

                                        När jag jämför PHP med C#, som jag tidigare har arbetat med, upplever jag att C# är mer robust.
                                        C# är ett striktare språk med starkare typkontroll, vilket kan leda till mer förutsägbar och strukturerad kod.
                                        Däremot, känns PHP som enklare för nybörjare att komma igång med.
                                </p>
                        </div>
                </article>
        </div>
        <?php include("includes/footer.php") ?>

</body>

</html>