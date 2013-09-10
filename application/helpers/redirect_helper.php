//note: user = 0 , admin = 1 

//case1: user level = 1 && uri = admin return TRUE, redirect to admin_dashboard

//case2: user level = 0 && uri = user return TRUE, redirect to user_dashboard 

//case3: user level = 0 && uri = admin, uri redirect to admin_dashboard 

//case4: user level = 1 && uri = user,  uri redirect to user_dashboard 