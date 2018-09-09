# -*- coding: utf-8 -*-
import os;
import math;
import types;
import csv

DATA_DIR = "D:\\ir_data"
file_data = []


def getIDF(term):
	df = 0	
	for filename in os.listdir(DATA_DIR):
		tmp_data = []
		ext = filename.split(".")
		if ext[1] == "txt":
			continue
		loadFile = open(os.path.join(DATA_DIR, filename), 'rb')
		for line in open('D:\\ir_data\\'+filename):
			row = loadFile.readline()
			tmp_data = row.split(' ')
			if tmp_data[0].encode('utf-8') == term:
				df = df+1
				#print tmp_data[0]
				break

	idf = math.log10(563/df)
	return idf



index_terms = []
loadWords = open(os.path.join(DATA_DIR, 'words.txt'), 'rb')
for line in open('D:\\ir_data\\words.txt'):
	row = loadWords.readline()
	tmp = row.split('\n')
	index_terms.append(tmp[0])
	#print tmp[0]



weight1 = []
weight2 = []
cnt = 0
for filename in os.listdir(DATA_DIR):
	ext = filename.split(".")
	if ext[1] == "txt":
		continue
	tmpIndex = []
	tmpTF = []
	loadFile = open(os.path.join(DATA_DIR, filename), 'rb')
	i = 0
	for line in open('D:\\ir_data\\'+filename):
		row = loadFile.readline()
		#print row
		tmp = row.split(' ')
		tmpIndex.append(tmp[0])
		tmpTF.append(tmp[1])
		#rint "TMP0:"+tmp[0]+"---LEN:"+str(len(tmp[0]))
		#rint "TMP1:"+tmp[1]
		i = i+1
		#先記錄下每個檔案的tf


	perWrdData = []
	perExData = []

	for x in xrange(0,len(index_terms)):
		IDFxTF = 0
		EXISTorNOT = 0
		for n in xrange(0,len(tmpIndex)):
			length = len(index_terms[x])-1
			nIndex = index_terms[x][0:length]  #去掉index_term的結束字元(?)
			if nIndex == tmpIndex[n]:
				EXISTorNOT = 1
				#print "nIndex:"+nIndex
				#print "tmpIndex[n]-------"+tmpIndex[n]
				idf = getIDF(nIndex.encode('utf-8'))				
				IDFxTF =  round(float(tmpTF[n])*idf,2)
				print "IDFxTF---"+str(IDFxTF)
		perWrdData.append(IDFxTF)
		perExData.append(EXISTorNOT)

	weight1.append(perWrdData)
	weight2.append(perExData)

	print cnt
	cnt = cnt+1


f = open('weight1.txt', 'w')
for x in xrange(0,len(weight1)):
	for n in xrange(0,len(weight1[x])):
		f.write(str(weight1[x][n]))
		f.write('\t')
	f.write('\n')
f.close()

f = open('weight2.txt', 'w')
for x in xrange(0,len(weight2)):
	for n in xrange(0,len(weight2[x])):
		f.write(str(weight2[x][n]))
		f.write('\t')
	f.write('\n')
f.close()

	
#f = open('weight.csv','w')
#w = csv.writer(f)
#w.writerows(weight1)
#f.close()




