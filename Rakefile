desc "Run functional tests"
task :behat do
  begin
    sh %{bin/behat --strict --config tests/behat.yml}
  rescue Exception
    exit 1
  end
end

desc "Default task"
task :default => [:behat]
