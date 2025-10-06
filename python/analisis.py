import pandas as pd
import os

def analizar_productos(archivo_csv):
    try:
        df = pd.read_csv(archivo_csv)
    
        columnas_requeridas = ['nombre', 'precio', 'stock']
        if not all(col in df.columns for col in columnas_requeridas):
            if len(df.columns) >= 3:
                df.columns = ['nombre', 'precio', 'stock'] + list(df.columns[3:])
            else:
                raise ValueError("No se encontraron suficientes columnas en el archivo CSV")
        
        df['precio'] = pd.to_numeric(df['precio'], errors='coerce')
        df['stock'] = pd.to_numeric(df['stock'], errors='coerce')
        
        promedio_precios = df['precio'].mean()
        producto_mayor_stock = df.loc[df['stock'].idxmax()]
        total_productos = len(df)
        
        print("\n--- Análisis de Productos ---")
        print(f"1. Promedio de precios: ${promedio_precios:,.2f}")
        print("\n2. Producto con mayor stock:")
        print(f"   Nombre: {producto_mayor_stock['nombre']}")
        print(f"   Precio: ${producto_mayor_stock['precio']:,.2f}" if pd.notna(producto_mayor_stock['precio']) else "   Precio: No disponible")
        print(f"   Stock: {int(producto_mayor_stock['stock']):,} unidades" if pd.notna(producto_mayor_stock['stock']) else "   Stock: No disponible")
        print(f"\n3. Total de productos: {total_productos:,}")
        
    except FileNotFoundError:
        print(f"Error: No se encontró el archivo {archivo_csv}")
    except pd.errors.EmptyDataError:
        print("Error: El archivo CSV está vacío")
    except Exception as e:
        print(f"Error al procesar el archivo: {str(e)}")

if __name__ == "__main__":
    directorio_actual = os.path.dirname(os.path.abspath(__file__))
    archivo_csv = os.path.join(directorio_actual, 'productos_1000.csv')
    
    if not os.path.exists(archivo_csv):
        print(f"Error: No se encontró el archivo {archivo_csv}")
        print("Por favor, asegúrate de que el archivo esté en la misma carpeta que este script.")
    else:
        print(f"Analizando archivo: {archivo_csv}")
        analizar_productos(archivo_csv)
