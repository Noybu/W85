<?php
include_once("header.php"); ?>
<script>
    const items = document.querySelectorAll(".accordion a");

function toggleAccordion(){
  this.classList.toggle('active');
  this.nextElementSibling.classList.toggle('active');
}

items.forEach(item => item.addEventListener('click', toggleAccordion));
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
                <img src="images/undraw_having_fun_iais.svg" alt="" width="100%">
                </div>
            </div>
        </section>


        <section>
            <div class="row">
                <h1>אז איך זה עובד?</h1>
            </div>
            <div class="row sm">
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
                        <a>Why is the moon sometimes out during the day?</a>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <a>Why is the sky blue?</a>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <a>Will we ever discover aliens?</a>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <a>How much does the Earth weigh?</a>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
                        </div>
                        </div>
                        <div class="accordion-item">
                        <a>How do airplanes stay up?</a>
                        <div class="content">
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.</p>
                        </div>
                        </div>
                    </div>
                    


                </div>

                <div class="col-lg-6 col-md-6 col-sm-10 col-xs-10 mx-auto">
                <h1 class="title">מאחורי המערכת</h1>

                </div>
            </div>
        </section>


</div>





    <h1>שאלות ותשובות</h1>
    <div>

        <div>    
            <p style="font-weight:bold;">מי בעל הרשאה במערכת?</p>
            <p>במערכת שלנו יש 2 "שחקנים" עיקריים : היזמים/המשקיעים , ונותני השירות<br>
            יזם/משקיע- כל אזרח שנרשם למערכת<br>
            נותני השירות - אזרחים שעובדים בתחום הבנייה והשיפוץ. כל נותן שירות יכול להרשם למערכת,<br>
            ולאחר אישור הפרופיל שלו ע"י מהנדס המערכת, הוא ייחשב בנוסף להיותו יזם, גם כנותן שירות מוסמך במערכת<br>
            נותני השירות הם אלו אשר יבצעו את הפרויקטים בשטח<br>
            וכמובן שמהנדס מטעם העירייה מפקח על כל מה שמתבצע במערכת<br>
            </p>
        </div>
        
        <div>    
            <p style="font-weight:bold;">איך אפשר לדעת אם הפרויקט שפתחתי אושר?</p>
            <p>בלשונית "הפרויקטים שלי" ניתן לעקוב אחר כל הפרויקטים שאותו משתמש פתח<br>
            כל כרטיסיית פרויקט מעודכנת בסטטוס האחרון בו פרויקט נמצא
            </p>
        </div>
        <div>    
            <p style="font-weight:bold;">איך בתור נותן שירות אני יודע אם זכיתי במכרז?</p>
            <p>בלשונית "המכרזים שלי" (רק עבור משתמש מסוג נותן שירות) ניתן לעקוב אחר כל הפרויקטים שמחכים לביצוע של אותו משתמש
            </p>
        </div>
        <div>    
            <p style="font-weight:bold;">כמה אנשים תרמו לפרויקט מסוים?</p>
            <p>כניסה לתוך כל כרטיסייה מציגה פרטים נוספים אודות פרויקט מסוים, כחלק מזה גם כמה אנשים תרמו לפרויקט
            </p>
        </div>
        <div>    
            <p style="font-weight:bold;">האם אני יכול לשלוח קישור לחברים על פרויקט שפתחתי?</p>
            <p>בהחלט ! כל כרטיסייה מכילה קישור לאפליקציות של : Whatsapp , Facebook כדי שתוכלו להפיץ את השמועה!
            </p>
        </div>
    </div>
</main
<?php include_once("footer.php"); ?>