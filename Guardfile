module ::Guard
  class Phpcli < Plugin
    def run_all
    end

    def run_on_modifications(paths)
      puts nil # 為了讓輸出好看一點XD
      puts `php sample-test.php`
    end
  end
end

guard 'phpcli' do
  watch(%r{\.php})
end