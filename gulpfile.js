// 各処理メソッドを、gulpの中で読み込むのではなく、直接取り出す
const {src, watch, dest, series} = require('gulp');
const changed = require('gulp-changed');
const sass = require('gulp-sass')(require('sass'));

// SassとCssの保存先を指定
// gulpからの実行ではなく、処理自体を、変数に格納する
const sassComp = () => {
  return src('./sass/**/*.scss')
    // 下記一行を追加
    .pipe(changed('./sass/**/*.scss'))
    .pipe(sass({outputStyle: 'expanded'}))
    .pipe(dest('./'));
};

// 自動監視のタスクを作成(sass-watchと名付ける) + コマンドから実行できるようにする
exports['sass-watch'] = () => {
  watch(['./sass/**/*.scss'], series(sassComp));
  // watcher.on('change', function(event){});
};
