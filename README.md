# Skaters

スケーターが自分のファッションやスケートボードの投稿をすることができるWebアプリ．
また、スケートパークも投稿する事ができ，<br>投稿してあるスケートパークを検索して，情報を得ることができる．<br>
![Skaters](https://user-images.githubusercontent.com/102647129/196023734-2926ff79-18c7-4ebe-bd25-03115cd37094.PNG)
<br>

# テストアカウント
- メールアドレス：user01@gmail.com
- パスワード　　：testuser01
<br>

# 背景
最近私がスケートボードを始めた際に，スケーターの友達が欲しいと感じた．<br>
また，初心者にとってスケートパークは敷居が高く，<br>
地域によってはスケートボードをする場所がない，という問題に直面した．
そのため，スケータの友達を増やすために，スケーター間で繋がることができ，<br>
スケートボードをする場所（専用のパーク、公園，空き地など）を共有できるようなアプリが欲しいと思った．
同時に投稿されたパークをおすすめの習熟レベルで絞り込むことができれば，<br>
初心者も練習しやすく，同レベルの友達も作れるのではないかと考えた．<br>


# 実装機能

#### ファッション投稿機能
- 投稿のCRUD機能
- いいね機能

#### スケートパーク投稿機能
- 投稿のCRUD機能
- パークのフリーワード検索機能
- パークの都道府県絞り込み検索機能
- パークの習熟度による絞り込み検索機能
- google map apiを使った位置情報表示機能

#### ユーザ機能
- ログイン機能
- フォロー機能
- フォロー・フォロワー一覧表示機能
- ファッション投稿一覧機能
- いいね投稿一覧機能
- パーク投稿一覧機能
  
# 使用技術
#### フロントエンド
- Vue　2.6.11
- bootstrap　4

#### バックエンド
- laravel　6.20.44
- php　8.0.20