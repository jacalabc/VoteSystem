
1. 需求功能
    * 功能一:註冊成為會員後，能參與投票。
    * 功能二:管理者帳號可以在後台新增問卷以以及更新首頁圖片。
    * 功能三:點選我要投票按鈕可以觀看投票結果。

2. 資料表

    * 資料表一(images)
        欄位名       資料型態       主鍵  預設值  自動遞增  備註
        id           int(11)        是     無    是
        image_name   varchar(255)   否     無    否        檔案名稱
        image_size   varchar(11)    否     無    否        檔案大小

    * 資料表二(questions)
        欄位名   資料型態   主鍵   預設值  自動遞增   備註
        id       int(10)    是     無      是
        text     text       否     無      否        文字內容
        parent   int(5)     否     無      否        題目id
        count    int(5)     否     0       否        統計

    * 資料表三(users)
    欄位名   資料型態   主鍵   預設值  自動遞增   備註
    id       int(10)    是     無      是
    acc     text        否     無      否        帳號
    pw      text        否     無      否        密碼
    email   text        否     無      否        電子郵件