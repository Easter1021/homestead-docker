# 關於 Ansible 專案佈署

## 安裝Ansible
```
// ubuntu
$ sudo apt-get install software-properties-common
$ sudo apt-add-repository ppa:ansible/ansible
$ sudo apt-get update
$ sudo apt-get install ansible
```

## 執行遠端佈署
```
$ ssh -t -l ubuntu 192.168.3.10 "cd ./ansible_actwg && ansible-playbook --private-key ~/.ssh/id_rsa -i hosts playbook.yml -vvvv"
```

## 進階使用
```
$ ansible-galaxy install -f  -r requirements.yml
$ ansible-playbook --private-key ~/.ssh/id_rsa -i hosts playbook.yml -vvvv
```

---

更多 Ansible 專案佈署相關資訊 http://docs.ansible.com/ansible/