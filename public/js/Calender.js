export default class Calender{
    constructor(year, month, today){
      this.year = year;
      this.month = month;
      this.today = today;
    }

    getCalenderHead(){
      const dates = [];
      const d = new Date(this.year, this.month, 0).getDate();
      const n = new Date(this.year, this.month, 1).getDay();

      for(let i = 0;i < n; i++){
        dates.unshift({
          date:d - i,
          isTodday: false,
          isDisabled: true,
        })
      }

      return(dates);
    }

    getCalenderBody(){
      const dates = [];
      const lastDate = new Date(this.year, this.month + 1, 0).getDate();

      for(let i = 1; i <= lastDate; i++){
        dates.push({
          date: i,
          isToday: false,
          isDisabled: false,
        });
      }


      if(this.year === this.today.getFullYear() && this.month === this.today.getMonth()){
        dates[this.today.getDate() - 1].isToday = true;
      }

      return(dates);
    }

    getCalenderTail(){
      const dates = [];
      const lastDay = new Date(this.year, this.month + 1, 0).getDay();

      for(let i = 1;i < 7 - lastDay; i++){
       dates.push({
        date: i,
        isToday: false,
        isDisabled:true
       });
      }

      return(dates);
    }

    createCalender(headDates,bodyDates,tailDates){
      //まず現在、表示しているカレンダーの中身をすべて削除する。
      const tbody = document.querySelector('tbody');
      while(tbody.firstChild){
        tbody.removeChild(tbody.firstChild);
      }

      //表示する月の年月を取得しタイトルに入れる。
      const title = `${this.year}/${this.month + 1}`;
      document.getElementById('title').textContent = title;

      //カレンダーに表示するすべての日付を取得する。
      const dates = [
        ...headDates,
        ...bodyDates,
        ...tailDates
      ];

      //週ごとの配列を作り日付をいれる。
      const weeks = [];
      const n = dates.length / 7;

      for(let i = 0; i < n; i++){
        weeks.push(dates.splice(0,7));
      }

      //週ごと（tr）ごとに日付の要素を作成、週の要素（tr）が完成したらカレンダーに追加。
      weeks.forEach(week => {
        const tr = document.createElement('tr');
        week.forEach(date => {
          const td = document.createElement('td');
          td.classList.add('date');

          //カスタムデータ属性を作り、tdごとに日付、年月を持たせる
          let year = this.year;
          let month = this.month + 1;

          //disabledの月にはdisabledクラスを付けながら、適正な月をつける。
          if (date.isDisabled) {
            td.classList.add('disabled');

            // date.date が 25 以上かどうかで条件を分ける
            if (date.date >= 25) {
                if (this.month === 0) {
                    year -= 1;
                    month = 12;
                } else {
                    month = this.month;
                }
            } else {
                if (month === 12) {
                    year += 1;
                    month = 1;
                } else {
                    month = this.month + 2;
                }
            }
        }

        month = month < 10 ? '0' + month : month; // 一桁の場合は先頭に0を追加する
        let day = date.date;
        day = day < 10 ? '0' + day : day; // 一桁の場合は先頭に0を追加する
        let fullDate = `${year}-${month}-${day}`;
        td.setAttribute('data-fulldate', fullDate);

        //もしdateの日付が今日だった場合はtodayクラスをつける
        if(date.isToday){
          td.classList.add('today');
        }



        const dateHead = document.createElement('div');
        dateHead.classList.add('date-head');
        dateHead.textContent = date.date;

        const dateContent = document.createElement('div');
        dateContent.classList.add('date-content');

        td.appendChild(dateHead);
        td.appendChild(dateContent);
        tr.appendChild(td);
        });

        document.querySelector('tbody').appendChild(tr);
      });

      this.setupEventListeners();
    }

    //カレンダーのそれぞれの日付に終日イベントのタイトルを表示するメソッド
    addEventsToCalender() {
        try {
            // イベントを blade から取得
            const events = window.events || [];

            // すべてのイベント要素を削除
            document.querySelectorAll('.eventTitle').forEach(eventDiv => eventDiv.remove());

            events.forEach(event => {
                const startDate = new Date(event.startDate);
                const endDate = new Date(event.endDate);

                // 終日イベントの開始日から終了日までの日付を取得
                const dateRange = [];
                let currentDate = startDate;
                while (currentDate <= endDate) {
                    dateRange.push(currentDate.toISOString().split('T')[0]);
                    currentDate.setDate(currentDate.getDate() + 1);
                }

                dateRange.forEach(date => {
                    const td = document.querySelector(`td[data-fulldate="${date}"]`);
                    if (td) { // td が存在するか確認
                        const div = document.createElement('div');
                        div.classList.add('eventTitle');
                        div.textContent = event.title;
                        td.appendChild(div);
                    }
                });
            });

        } catch (error) {
            // エラーが発生した場合の処理
            console.error('An error occurred while adding events to the calendar:', error);
        }
    }


    moveToPreviousMonth(){
      document.getElementById('prev').addEventListener('click', () => {
        this.month--;
        if(this.month < 0){
          this.year--;
          this.month = 11;
        }

        const headDates = this.getCalenderHead();
        const bodyDates = this.getCalenderBody();
        const tailDates = this.getCalenderTail();


       this.createCalender(headDates, bodyDates, tailDates);
       this.addEventsToCalender();
      });
    }


    moveToNextMonth(){
      document.getElementById('next').addEventListener('click', () => {
        this.month++;
        if(this.month > 11){
          this.year++;
          this.month = 0;
        }

        const headDates = this.getCalenderHead();
        const bodyDates = this.getCalenderBody();
        const tailDates = this.getCalenderTail();


       this.createCalender(headDates, bodyDates, tailDates);
       this.addEventsToCalender();
      });
    }

    setupEventListeners() {
      // dateクラスがクリックされるとGETで日付、年月をscheduleに送信する。
      const dates = document.querySelectorAll('.date');
      dates.forEach(date => {
        date.addEventListener('click', (e) => {
            // クリックされた要素が td でない場合は親要素 (td) から data-fulldate を取得
            let target = e.target;
            if (target.classList.contains('eventTitle')) {
                // クリックされた要素が div (eventTitle) の場合、その親要素 (td) を参照
                target = target.closest('.date');
            }

            // target が td 要素であることを確認
            if (target && target.dataset.fulldate) {
                const date = target.dataset.fulldate;
                window.location.href = `/works/events/schedule/${date}`;
            } else {
                console.warn('No valid date found for redirection.');
            }
        });
        });
    }
}


