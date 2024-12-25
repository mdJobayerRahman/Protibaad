from selenium import webdriver
from webdriver_manager.chrome import ChromeDriverManager
from selenium.webdriver.common.keys import Keys

driver = webdriver.Chrome(ChromeDriverManager().install())
driver.get("http://localhost/Project_Protibaad/index.php")
print(driver.title)


inputUsername= driver.find_element_by_name('user')
inputPass= driver.find_element_by_name('password')
inputBtn= driver.find_element_by_name('submit')

inputUsername.send_keys('Siam')
inputPass.send_keys('1234')


oldTitle = driver.title
inputBtn.click()
newTitle = driver.title

if(oldTitle == newTitle):
	print('invalid pass')
else:
	print('logged in!')

opinionBtn= driver.find_element_by_xpath('/html/body/header/nav/a[6]')

opinionBtn.click()


# viewBtn= driver.find_element_by_xpath('//*[@id="features"]/div[1]/div[1]/a')
# viewBtn.click()



# searchbox= driver.find_element_by_name('s')
# searchbox.send_keys('CSE'+ Keys.RETURN)
#searchbox.send_keys('CSE')
#btn = driver.find_element_by_id('searchsubmit')
#btn.click()

# link= driver.find_element_by_xpath('//*[@id="post-5934"]/header/h1/a')
# print(link)
# print(link.text)



while(True):
	continue
