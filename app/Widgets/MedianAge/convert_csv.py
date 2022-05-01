import pandas as pd
df = pd.read_excel(r'../../../data/widget-median-age.xlsx')
print(df["Unnamed: 5"].unique())
filter_ = df['Unnamed: 5'].isin(['Country/Area'])
df = df[filter_]#["Unnamed: 5"] == 'Country/Area')
df.columns = ['Index', 'Variant', 'Country/Area','Notes','Country Code', 'Type','Parent code', '1950', '1955', '1960', '1965', '1970', '1975', '1980', '1985', '1990', '1995', '2000','2005', '2010', '2015', '2020']
df.to_csv(r'../../../data/widget-median-age.csv')
