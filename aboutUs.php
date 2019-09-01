<?php
include_once("header.php"); ?>
<script>
    jQuery( document ).ready(function() {
        const items = document.querySelectorAll(".accordion a");

function toggleAccordion(){
  this.classList.toggle('active');
  this.nextElementSibling.classList.toggle('active');
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
});
    
</script>

<main>

<div class="container">
        <section>
            <div class="row sm">
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto">
                    <h1 class="title">מהי מטרת המערכת?</h1>
                    <p class="subtitle">כל אזרח היה רוצה לשפר את פני האזור בו הוא חי<br>
            המצב הנוכחי מביא את האזרח לתסכול מאחר והעירייה עמוסה בפניות רבות, ולרוב היא חסרת תקציב לכלל הדרישות של התושבים<br>
            המערכת שלנו נועדה לגשר בין הרצון של האזרחים לשפר את פני העיר, לבין הביצוע בשטח של העבודות<br></p>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto">
                <img src="images/undraw_best_place_r685.svg" alt="" width="100%">
                </div>
            </div>
        </section>


        <section>
            <div class="center">
                <h1>אז איך זה עובד?</h1>
            </div>
            <div class="center sm">
            <p> כל רעיון חדש מטעם יזם/משקיע, יוגש למהנדס מטעם העירייה<br>
            מהנדס מטעם העירייה מחוייב לאשר / לדחות את כלל הפרויקטים שנפתחים במערכת<br>
            במידה והפרויקט אושר, הפרויקט יפתח למכרז עבור נותני השירות שמאושרים במערכת<br>
            כל נותן שירות שאושר במערכת, יציע תאריך אחרון לסיום הפרויקט, ומחיר עבור ביצועו<br>
            המהנדס בוחר את נותן השירות מתוך כלל נותני השירות שנרשמו לאותו מכרז<br>
            לאחר סגירת המכרז, הפרויקט עובר למימון ההמונים! וכאן כל משתמש יכול להשפיע!!<br>
            בתום מימון הפרויקט, נותן השירות מתחיל בביצוע הפרויקט בשטח.<br>
            לאחר סיום הפרויקט כל משתמש יכול לדרג את הפרויקט, ולצפות בממוצע הדירוגים הקודמים<br>
            </p>
            </div>
        </section>

        <section>
            <div class="row sm">
                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto">
                    <h1 class="title">שאלות ותשובות</h1>

                    <div class="accordion">
                        <div class="accordion-item">
                        <a>מי בעל הרשאה במערכת?</a>
                        <div class="content">
                                <p>במערכת שלנו יש 2 "שחקנים" עיקריים : היזמים/המשקיעים , ונותני השירות<br>
                                יזם/משקיע- כל אזרח שנרשם למערכת<br>
                                נותני השירות - אזרחים שעובדים בתחום הבנייה והשיפוץ. כל נותן שירות יכול להרשם למערכת,<br>
                                ולאחר אישור הפרופיל שלו ע"י מהנדס המערכת, הוא ייחשב בנוסף להיותו יזם, גם כנותן שירות מוסמך במערכת<br>
                                נותני השירות הם אלו אשר יבצעו את הפרויקטים בשטח<br>
                                וכמובן שמהנדס מטעם העירייה מפקח על כל מה שמתבצע במערכת<br>
                                </p>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <a>איך אפשר לדעת אם הפרויקט שפתחתי אושר?</a>
                        <div class="content">
                                <p>בלשונית "הפרויקטים שלי" ניתן לעקוב אחר כל הפרויקטים שאותו משתמש פתח<br>
                                כל כרטיסיית פרויקט מעודכנת בסטטוס האחרון בו פרויקט נמצא
                                </p>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <a>איך בתור נותן שירות אני יודע אם זכיתי במכרז?</a>
                        <div class="content">
                            <p>בלשונית "המכרזים שלי" (רק עבור משתמש מסוג נותן שירות) ניתן לעקוב אחר כל הפרויקטים שמחכים לביצוע של אותו משתמש
                            </p>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <a>איך בתור נותן שירות אני יודע אם זכיתי במכרז?</a>
                        <div class="content">
                                <p>בלשונית "המכרזים שלי" (רק עבור משתמש מסוג נותן שירות) ניתן לעקוב אחר כל הפרויקטים שמחכים לביצוע של אותו משתמש
                                </p>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <a>כמה אנשים תרמו לפרויקט מסוים?</a>
                        <div class="content">
                                <p>כניסה לתוך כל כרטיסייה מציגה פרטים נוספים אודות פרויקט מסוים, כחלק מזה גם כמה אנשים תרמו לפרויקט
                                    </p>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <a>האם אני יכול לשלוח קישור לחברים על פרויקט שפתחתי?</a>
                        <div class="content">
                                <p>בהחלט ! כל כרטיסייה מכילה קישור לאפליקציות של : Whatsapp , Facebook כדי שתוכלו להפיץ את השמועה!
                            </p>
                        </div>
                        </div>
                    </div>
                    


                </div>

                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto">
                <h1 class="title">מאחורי המערכת</h1>

                <div><figure>
				<img src="images/ido.jpg" class="aupPic">
			    <figcaption><p>עידו נברו</p></figcaption>
                </figure></div>
                
                <div><figure>
				<img src="images/noy.jpg" class="aupPic">
			    <figcaption><p>נוי בוכמן</p></figcaption>
                </figure></div>
                
               <div> <figure>
				<img src="images/asaf.jpg" class="aupPic">
			    <figcaption><p>אסף פייביש</p></figcaption>
				</figure></div>

                </div>
            </div>
        </section>


</div>


</main
<?php include_once("footer.php"); ?>